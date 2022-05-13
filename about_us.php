<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once("include/header.php") ?>
    <?php if(!isset($_SESSION['username'])){header('Location: login.php');} ?>
    <?php if(isset($_SESSION['role'])){if($_SESSION['role']=='admin'){header('Location: admin/welcome.php');}} ?>
    <title>LiFECLiCK</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <nav class="navbar navbar-expand-lg navbar-light top-nav" style="background-color: #ed6b6d;">
      <div style="flex-basis: 50%;">
        <a class="navbar-brand text-light" href="index.php" style="font-weight:600; font-size:40px"><img width="70px" src="assets/WBLogo.png" alt="logo">&nbsp;BWB Air Quality</a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-basis: 50%; justify-content: flex-end;">
        <div style="display:flex; justify-content:flex-end;">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link text-light" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="sensors.php">Sensors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active-nav text-light" href="about_us.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="welcome.php">Account</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br>
    <section style="padding:2rem;">
      <div class="w-layout-grid grid-3">
        <div class="flex-v">
          <div class="content-center">
            <img src="assets/ter.png" loading="lazy" alt="" width="150px;" style="border-radius: 50%; border: 5px solid gray  ;">
          </div>
          <div class="content-center" style="padding: 2rem; padding-top:0.5rem;">
            <div class="h3 fw-bold text-center">JESTER KYLE SERCEDILLO</div>
            <div class="h5 fw-normal">BACKEND</div>
            <br>
            <p class="text-center"><p>Lorem ipsum dolor sit amet. Et dolorem doloremque et repellat unde ea voluptatum pariatur At porro quisquam sed suscipit voluptate ad quos iusto. Et dolor tempore ex earum magni aut nisi molestias. Id quaerat dignissimos est quod ipsa et esse similique. </p></p>
          </div>
        </div>
        <div class="flex-v">
          <div class="content-center">
            <img src="assets/aye.png" loading="lazy" alt="" width="150px;" style="border-radius: 50%; border: 5px solid gray  ;">
          </div>
          <div class="content-center" style="padding: 2rem; padding-top:0.5rem;">
            <div class="h3 fw-bold text-center">AYEZZA SALVAE DUTERTE</div>
            <div class="h5 fw-normal">QUALITY ANALYST/ASSURANCE</div>
            <br>
            <p class="text-center"><p>Lorem ipsum dolor sit amet. Et dolorem doloremque et repellat unde ea voluptatum pariatur At porro quisquam sed suscipit voluptate ad quos iusto. Et dolor tempore ex earum magni aut nisi molestias. Id quaerat dignissimos est quod ipsa et esse similique. </p></p>
          </div>
        </div>
        <div class="flex-v">
          <div class="content-center">
            <img src="assets/tine.png" loading="lazy" alt="" width="150px;" style="border-radius: 50%; border: 5px solid gray ;">
          </div>
          <div class="content-center" style="padding: 2rem; padding-top:0.5rem;">
            <div class="h3 fw-bold text-center">CHRISTINE JANE CERDINA</div>
            <div class="h5 fw-normal">RESEARCHER</div>
            <br>
            <p class="text-center"><p>Lorem ipsum dolor sit amet. Et dolorem doloremque et repellat unde ea voluptatum pariatur At porro quisquam sed suscipit voluptate ad quos iusto. Et dolor tempore ex earum magni aut nisi molestias. Id quaerat dignissimos est quod ipsa et esse similique. </p></p>
          </div>
        </div>
        <div class="flex-v">
          <div class="content-center">
            <img src="assets/ish.png" loading="lazy" alt="" width="150px;" style="border-radius: 50%; border: 5px solid gray  ;">
          </div>
          <div class="content-center" style="padding: 2rem; padding-top:0.5rem;">
            <div class="h3 fw-bold text-center">TRISHA ABELLO</div>
            <div class="h5 fw-normal">UI/UX DESIGNER</div>
            <br>
            <p class="text-center"><br><p>Lorem ipsum dolor sit amet. Et dolorem doloremque et repellat unde ea voluptatum pariatur At porro quisquam sed suscipit voluptate ad quos iusto. Et dolor tempore ex earum magni aut nisi molestias. Id quaerat dignissimos est quod ipsa et esse similique. </p></p>
          </div>
        </div>
        <div class="flex-v">
          <div class="content-center">
            <img src="assets/lars.jpg" loading="lazy" alt="" width="150px;" style="border-radius: 50%; border: 5px solid gray ;">
          </div>
          <div class="content-center" style="padding: 2rem; padding-top:0.5rem;">
            <div class="h4 fw-bold text-center">LARRY NABOA</div>
            <div class="h5 fw-normal">HARDWARE/PROGRAMMER</div>
            <br>
            <p class="text-center"><br><p>Lorem ipsum dolor sit amet. Et dolorem doloremque et repellat unde ea voluptatum pariatur At porro quisquam sed suscipit voluptate ad quos iusto. Et dolor tempore ex earum magni aut nisi molestias. Id quaerat dignissimos est quod ipsa et esse similique. </p></p>
          </div>
        </div>
      </div>
    </section>
    <?php include("include/design.php") ?>
  </body>
</html>
