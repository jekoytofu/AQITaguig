<?php session_start();

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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
        <a class="navbar-brand text-light" href="index.php" style="font-weight:600; font-size:40px"><img width="70px" src="assets/WBLogo.png" alt="logo">&nbsp;CV Air Quality</a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-basis: 50%; justify-content: flex-end;">
        <div style="display:flex; justify-content:flex-end;">
          <ul class="navbar-nav mr-auto">
            <li><a class="nav-link text-light" href="index.php">Home</a></li>
            <li><a class="nav-link active-nav text-light" href="sensors.php">Dashboard</a></li>
            <li><a class="nav-link text-light" href="about_us.php">About Us</a></li>
            <li><a class="nav-link text-light" href="welcome.php">Account</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <section style="padding:3rem; min-height: 70vh; background-color: #ffffff;">
      <div class="card-sn">
      <h1 class="title h1 font-weight-bold" color="#38424d">Air Quality in Centennial Village</h1>
      <p class="h4">
        <br>Centennial Village Air Quality Index <strong>(CVAQI)</strong> and Ozone <strong>(O3)</strong> and Carbon Monoxide <strong>(CO)</strong> air pollution in Centennial Taguig
      </p>
    </div>
    <div class="aqi-index">

    </div>
      <div class="graphBox">
        <div class="box b1">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          <div id="chart_sensor" style="width: 300px; height: 100px;"></div>
       </div>
        <div class="box b2">
          <div class="aqi-index">
            <div class="aqi-box">
              <p class="aqi-value_unit">BWB AQI </p>
              <p class="aqi-value_value">20 </p>
            </div>
            <p class="aqi-status">
              <span class="aqi-status_label">Live Aqi Index</span>
              <br>
              <span class="aqi-status_text">Good</span>
            </p>
          </div>
       </div>
       <div class="box">
         <canvas id="myChart"></canvas>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="my_chart.js"></script>
    </section>
    <?php include("include/footer.php") ?>
  </body>
</html>
