<?php
require_once 'aqi-calculator-functions.php';

$aqiArray = [];
$tsp = (!empty($_POST['tsp'])) ? $_POST['tsp'] : '';
$pm10 = (!empty($_POST['pm10'])) ? $_POST['pm10'] : '';
$co = (!empty($_POST['co'])) ? $_POST['co'] : '';
$so2 = (!empty($_POST['so2'])) ? $_POST['so2'] : '';
$ozone8hr = (!empty($_POST['ozone8hr'])) ? $_POST['ozone8hr'] : '';
$ozone1hr = (!empty($_POST['ozone1hr'])) ? $_POST['ozone1hr'] : '';
$no2 = (!empty($_POST['no2'])) ? $_POST['no2'] : '';

if (!empty($_POST)) {
    foreach($_POST as $key => $value) {
        $highLowValue[$key] = getHighLow($key, $value);

        if (!empty($highLowValue[$key])) {
            $finalCalculation[$key]['aqi'] = calculateIndex($highLowValue[$key], $value);
            $finalCalculation[$key]['health-reco'] = $highLowValue[$key]['health-reco'];
            $finalCalculation[$key]['cautionary'] = $highLowValue[$key]['cautionary'];
            $finalCalculation[$key]['label'] = $highLowValue[$key]['label'];
            $finalCalculation[$key]['categoryNum'] = $highLowValue[$key]['categoryNum'];
        }
    }

    $major = 0;

    foreach($finalCalculation as $key => $value) {
        if ($value['aqi'] > $major) {
            $major = $value['aqi'];

            $majorPollutantArray = [
                'aqi' => $value['aqi'],
                'health-reco' => $value['health-reco'],
                'cautionary' => $value['cautionary'],
                'label' => $value['label'],
                'pollutantCode' => $key,
                'categoryNum' => $value['categoryNum']
            ];
        }
    }

    $majorPollutantArray['pollutantName'] = getPollutantNameByCode($majorPollutantArray['pollutantCode']);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AQI Calculator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        .color-1 {
            background-color: #00e400;

        }
        .color-2 {
            background-color: #ffff00;
        }
        .color-3 {
            background-color: #ff7e00;
        }
        .color-4 {
            background-color: #ff0000;
        }
        .color-5 {
            background-color: #99004c;
        }
        .color-6, .color-7 {
            background-color: #7e0023;
        }

        .color-4, .color-5, .color-6, .color-7 {
            color : #fff;
        }

        [class*='color-'] {
            font-weight:bold;
            text-transform: uppercase;
            font-size: 25px;
        }

        .card-header {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <br>
    <?php
    if (!empty($_SESSION['error'])) {
    ?>
    <div class="alert alert-danger text-center" role="alert">
        <strong><?php echo $_SESSION['error']; ?></strong>
    </div>
    <?php
    }
    ?>
    <br><br>
    <div class="card text-center">
            <h1>AQI Calculator</h1>
    </div>
    <br><br>
    <div class="container">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">TSP - Total Suspended Particulate (24hr avg)</label>
                <div class="col-sm-8">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="tsp" value="<?php echo $tsp; ?>" placeholder="Enter the Concentration">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">μg/Nm³</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">PM10 - Particulate 10 microns (24hr avg) </label>
                <div class="col-sm-8">
                    <div class="input-group mb-3">
                            <input type="number" class="form-control" name="pm10" value="<?php echo $pm10; ?>" placeholder="Enter the Concentration">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">μg/Nm³</span>
                            </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">CO - Carbon Monoxide (8hr avg) </label>
                <div class="col-sm-8">
                    <div class="input-group mb-3">
                            <input type="number" class="form-control" name="co" value="<?php echo $co; ?>" placeholder="Enter the Concentration">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">ppm</span>
                            </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">SO2 - Sulfur Dioxide (24hr avg) </label>
                <div class="col-sm-8">
                    <div class="input-group mb-3">
                            <input type="number" class="form-control" name="so2" value="<?php echo $so2; ?>" placeholder="Enter the Concentration">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">ppm</span>
                            </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">O3 - Ozone (8hr avg) </label>
                <div class="col-sm-8">
                    <div class="input-group mb-3">
                            <input type="number" class="form-control" name="ozone8hr" value="<?php echo $ozone8hr; ?>" placeholder="Enter the Concentration">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">ppm</span>
                            </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">O3 - Ozone (1hr avg) </label>
                <div class="col-sm-8">
                    <div class="input-group mb-3">
                            <input type="number" class="form-control" name="ozone1hr" value="<?php echo $ozone1hr; ?>" placeholder="Enter the Concentration">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">ppm</span>
                            </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">NO2 - Nitrogen Dioxide (1hr avg) </label>
                <div class="col-sm-8">
                    <div class="input-group mb-3">
                            <input type="number" class="form-control" name="no2" value="<?php echo $no2; ?>" placeholder="Enter the Concentration">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">ppm</span>
                            </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success btn-block">Calculate</button>
                </div>
          </div>
        </form>
        <?php
            if (!empty($majorPollutantArray) && empty($_SESSION['error'])) {
        ?>
        <div class="card">
            <div class="card-header text-center <?php echo 'color-' . $majorPollutantArray['categoryNum']; ?>">
            <?php echo $majorPollutantArray['label']; ?>
            </div>
            <div class="card-body text-center">
                <h2 class="card-title">AQI = <?php echo number_format($majorPollutantArray['aqi'], 2); ?></h2>
                <h4 class="card-title">Major Pollutant : <strong><?php echo $majorPollutantArray['pollutantName']; ?></strong></h4>
                <p class="card-text"><?php echo $majorPollutantArray['health-reco']; ?></p>
            </div>
            <div class="card-footer">
                <span class="text-left"><b>Cautionary Statements:</b></span> <br>
                <p class="text-center"><i><?php echo $majorPollutantArray['cautionary']; ?></i></p>
            </div>
        </div>
        <?php
            }
        ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
