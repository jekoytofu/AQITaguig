<?php session_start();
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

<?php
  if(isset($_SESSION['username'])){
    if(isset($_SESSION['role'])){
      if($_SESSION['role'] == "user"){
        //header("Location: welcome.php");
      } else {
        header("Location: admin/welcome.php");
      }
    }
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once("include/header.php") ?>
    <?php require_once("include/graph.css") ?>
    <?php if(!isset($_SESSION['username'])){header('Location: login.php');} ?>
    <title>Sensors</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/aqi.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
    <style media="screen">
          .block-weighted {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
          }

          .weight-50 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 50%;
            -ms-flex: 0 50%;
            flex: 0 50%;
          }

          .dual-content-left {
            margin-right: 3rem;
          }

          .content-center {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
          }
          .w-layout-grid {
            display: -ms-grid;
            display: grid;
            grid-auto-columns: 1fr;
            -ms-grid-columns: 1fr 1fr;
            grid-template-columns: 1fr 1fr;
            -ms-grid-rows: auto auto;
            grid-template-rows: auto auto;
            grid-row-gap: 16px;
            grid-column-gap: 16px;
          }

          .grid-3 {
            -ms-grid-columns: 1fr 1fr 1fr 1fr 1fr;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            -ms-grid-rows: auto;
            grid-template-rows: auto;
          }

          .flex-v {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
          }

          @media screen and (max-width: 991px) {
            .block-weighted {
              -webkit-box-orient: vertical;
              -webkit-box-direction: normal;
              -webkit-flex-direction: column;
              -ms-flex-direction: column;
              flex-direction: column;
            }
            .dual-content-left {
              margin-right: 0rem;
              margin-bottom: 1.5rem;
            }
            .grid-3 {
              -ms-grid-columns: 1fr;
              grid-template-columns: 1fr;
            }

          }
      </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light top-nav" style="background-color: #0000ff;">
      <div style="flex-basis: 50%;">
        <a class="navbar-brand text-light" href="index.php" style="font-weight:600; font-size:40px"><img width="70px" src="assets/CVAQILOGO.png" alt="logo">&nbsp;CV Air Quality</a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-basis: 50%; justify-content: flex-end;">
        <div style="display:flex; justify-content:flex-end;">
          <ul class="navbar-nav mr-auto">
            <li><a class="nav-link text-light" href="index.php">Home</a></li>
            <li><a class="nav-link active-nav text-light" href="dashboar.php">Dashboard</a></li>
            <li><a class="nav-link text-light" href="about_us.php">About Us</a></li>
            <li><a class="nav-link text-light" href="welcome.php">Account</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <section style="padding:3rem; min-height: 70vh; background-color: #ffffff;">
      <?php
      if (!empty($_SESSION['error'])) {
      ?>
      <div class="alert alert-danger text-center" role="alert">
          <strong><?php echo $_SESSION['error']; ?></strong>
      </div>
      <?php
      }
      ?>
      <div class="card-sn text-center">
              <h1>AQI Calculator</h1>
      </div>
      <br>
      <div class="container">
        <div class="card-br">
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
        </div>
          <?php
              }
          ?>

      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </section>
      <?php include("include/footer.php") ?>
  </body>
</html>
