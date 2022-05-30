<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once("include/header.php") ?>
    <?php if(!isset($_SESSION['username'])){header('Location: login.php');} ?>
    <?php if(isset($_SESSION['role'])){if($_SESSION['role']=='admin'){header('Location: admin/welcome.php');}} ?>
    <title>BWB Air Quality</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/footer.css">
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
        .weight-70 {
          -webkit-box-flex: 0;
          -webkit-flex: 0 70%;
          -ms-flex: 0 50%;
          flex: 0 70%;
        }
        .weight-30 {
          -webkit-box-flex: 0;
          -webkit-flex: 0 30%;
          -ms-flex: 0 50%;
          flex: 0 30%;
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
      <div class="navbar-area">
      <nav class="navbar navbar-expand-lg navbar-light top-nav" style="background-color: #0000ff;">
        <div style="flex-basis: 50%;">
          <a class="navbar-brand text-light" href="index.php" style="font-weight:600; font-size:40px"><img width="70px" src="assets/WBLogo.png" alt="logo">&nbsp;CV Air Quality</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-basis: 50%; justify-content: flex-end;">
        <div style="display:flex; justify-content: flex-end;">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link active-nav text-light" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="sensors.php">Sensors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="about_us.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="welcome.php">Account</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
    <section>
      <img src="assets/centen.jpg" alt="homepage" style="width:100%;">
    </section>
    <section style="padding:2rem; padding-left:3rem; padding-right:3rem;" class="container">
      <div class="block-weighted" style="padding: 2rem; padding-bottom: 0%">
        <div class="weight-50 dual-content-left" "col-lg-6">
          <div class="card-br">
          <h1 class="title h1 font-weight-bold">Welcome to Centennial Village Air Quality Monitor</h1>
          <p class="h4">
            <br>Air pollution remains a problem in the Philippines. To lessen the risks of polluted air, monitoring and reducing air pollution
            individually would be a helpful solution. Barangay Western Bicutan is surrounded by big factories with big highways and motor emissions.
          </p>
        </div>
      </div>
        <div class="weight-60 content-center">
          <img src="assets/measure.png" alt="" height="370px" weight="100%">
        </div>
      </div>

      <br>
            <section class="container" style="display: flex;  justify-content: center;">
            <div class="card-AQI">
              <div class="grid-container">
              <div class="grid-item"><b>BWB AQI Level</b></div>
              <div class="grid-item"><b>Colors</b></div>
              <div class="grid-item"><b>Health Recommendation</b></div>

              <div class="grid-item-green"><strong>Good</strong> <br>(G, 0-10)</div>
              <div class="grid-item-green"><strong>Green</strong></div>
              <div class="grid-item-blue">Air Quality is satisfactory and poses little or no risk.</div>

              <div class="grid-item-yellow"><strong>Fair</strong> <br>(F, 11-20)</div>
              <div class="grid-item-yellow"><strong>Yellow</strong></div>
              <div class="grid-item-blue">Sensitive individuals should avoid outdoor activity
                            as they may experience respiratory symptoms.</div>

              <div class="grid-item-orange"><strong>Unhealthy for Sensitive Groups</strong> <br>(USG, 21-30)</div>
              <div class="grid-item-orange"><strong>Orange</strong></div>
              <div class="grid-item-blue">General public and sensitive individuals in particular are at risk
                            to experience irritation and respiratory problem.</div>

              <div class="grid-item-red"><strong>Very Unhealthy</strong><br>(VU, 31-40)</div>
              <div class="grid-item-red"><strong>Red</strong></div>
              <div class="grid-item-blue">Increased likehood of adverse effects and aggravation
                            to the heart and lungs among general public.</div>

              <div class="grid-item-red-orange"><strong>Acutely Unhealthy</strong><br>(AU, 41-50)</div>
              <div class="grid-item-red-orange"><strong>Red Orange</strong></div>
              <div class="grid-item-blue">General Public will be noticeably affected. Sensitive groups should
                            restrict outdoor activities.</div>

              <div class="grid-item-maroon"><strong>Emergency</strong><br>(E, 51-70)</div>
              <div class="grid-item-maroon"><strong>Maroon</strong></div>
              <div class="grid-item-blue">General public at high risk of experiencing strong irritation and adverse
                            health effects. Should avoid outdoor activities.</div>
                          </div>
            </div>
            </section>

            <br><br><br>

    </section>
    <?php include("include/design.php") ?>
    <?php include("include/footer.php") ?>
  </body>
</html>
