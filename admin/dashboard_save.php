<?php session_start(); ?>
<?php
	$date = date("Y", strtotime("+ 8 HOURS"));
	$conn = new mysqli("localhost", "root", "", "mediclock_db") or die(mysqli_error());
	$qcovid = $conn->query("SELECT COUNT(*) as total FROM `users` WHERE `year` = '$date' GROUP BY `id`") or die(mysqli_error());
	$fcovid = $covid->fetch_array();
	$qcancer = $conn->query("SELECT COUNT(*) as total FROM `sections` WHERE `year` = '$date' GROUP BY `id`") or die(mysqli_error());
	$fcancer = $qcancer->fetch_array();
	$qallergy = $conn->query("SELECT COUNT(*) as total FROM `sections` WHERE `year` = '$date' GROUP BY `id`") or die(mysqli_error());
	$fallergy = $qallergy->fetch_array();
	$qrehab = $conn->query("SELECT COUNT(*) as total FROM `sections` WHERE `year` = '$date' GROUP BY `id`") or die(mysqli_error());
	$frehab = $qrehab->fetch_array();
	$qhblood = $conn->query("SELECT COUNT(*) as total FROM `sections` WHERE `year` = '$date' GROUP BY `id`") or die(mysqli_error());
	$fhblood = $qhblood->fetch_array();
  $qmedication = $conn->query("SELECT COUNT(*) as total FROM `sections` WHERE `year` = '$date' GROUP BY `id`") or die(mysqli_error());
	$fmedication = $qmedication->fetch_array();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once("../include/admin/header.php") ?>
    <?php if(!isset($_SESSION['username'])){header('Location: ../login.php');} ?>
    <?php if(isset($_SESSION['role'])){if($_SESSION['role']=='user'){header('Location: ../welcome.php');}} ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
    <?php require 'script.php'?>
    <script src ="js/jquery.canvasjs.min.js"></script>
    <script type="text/javascript">
    window.onload = function() {
    				$("#chartContainer").CanvasJSChart({
    					title: {
    						text: "Total Patient Population <?php echo $date?>",
    						fontSize: 24
    					},
    					axisY: {
    						title: "asda"
    					},
    					legend :{
    						verticalAlign: "center",
    						horizontalAlign: "left"
    					},
    					data: [
    					{
    						type: "pie",
    						showInLegend: true,
    						toolTipContent: "{label} <br/> {y}",
    						indexLabel: "{y}",
    						dataPoints: [
    							{ label: "Highblood Maintenance",  y:
    								<?php
    									if($fhblood == ""){
    											echo 0;
    									}else{
    										echo $fhblood['total'];
    									}
    								?>, legendText: "Highblood Maintenance"},
    							{ label: "Allergy Treatment",  y:
    								<?php
    									if($fallergy == ""){
    										echo 0;
    									}else{
    										echo $fallergy['total'];
    									}
    								?>, legendText: "Allergy Treatment"},
    							{ label: "Cancer Patient",  y:
    								<?php
    									if($fcancer == ""){
    										echo 0;
    									}else{
    										echo $fcancer['total'];
    									}
    								?>, legendText: "Cancer Patient"},
    							{ label: "Covid 19 Patient",  y:
    								<?php
    									if($fcovid == ""){
    										echo 0;
    									}else{
    									echo $fcovid['total'];
    									}
    								?>, legendText: "Covid 19 Patient"},
    							{ label: "Rehabilitation",  y:
    								<?php
    									if($frehab == ""){
    										echo 0;
    									}else{
    										echo $frehab['total'];
    									}
    								?>, legendText: "Rehabilitation"},
                  { label: "Medication",  y:
      							<?php
      								if($fmedication == ""){
      									echo 0;
      								}else{
      									echo $fmedication['total'];
      								}
      							?>, legendText: "Medication"},
    						]
    					}
    					]
    				});
    			}
    </script>
    <title></title>
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
    <nav class="navbar navbar-expand-lg navbar-light top-nav" style="background-color: #43609C; ">
      <div style="flex-basis: 50%;">
        <a class="navbar-brand text-light" href="dashboard.php" style="font-weight:600; font-size:40px"><img width="70px" src="../assets/logooooo.png" alt="logo">&nbsp;LiFECLiCK</a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-basis: 50%; justify-content: flex-end;">
        <div style="display:flex; justify-content:flex-end;">
          <ul class="navbar-nav mr-auto">
            <li><a class="nav-link active-nav text-light" href="dashboard.php">Dashboard</a></li>
            <li><a class="nav-link text-light" href="accounts.php">Accounts</a></li>
            <li><a class="nav-link text-light" href="contact_us.php">Feedback</a></li>
            <li><a class="nav-link text-light" href="patients.php">Patients</a></li>
            <li class="nav-item">
            <?php
              if(isset($_SESSION['username'])){
                if(isset($_SESSION['role'])){
                  if($_SESSION['role'] == 'admin'){
                    ?>
                      <a class="nav-link text-light" href="welcome.php"><?php echo $_SESSION['username'] ?></a>
                    <?php
                  }
                }

              } else {
              ?>
                <a class="nav-link text-light" href="login.php">Log In</a>
              <?php
              }
            ?>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    <section style="padding:2rem; min-height: 70vh; background-color: #f8f8f8;" class="content-center">
      <div class="container">
          <div class="card">
            <!-- disoplay here chart -->
            <div id="chartContainer" style="width: 100%; height: 400px"></div>
          </div>
      </div>
    </section>
    <?php include("../include/admin/footer.php") ?>
  </body>
</html>
