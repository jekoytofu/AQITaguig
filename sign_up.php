<?php require_once('include/session.php') ?>
<?php include("include/config.php") ?>

<?php
  if(isset($_SESSION['username'])){
    if(isset($_SESSION['role'])){
      if($_SESSION['role'] == "user"){
        header("Location: welcome.php");
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
    <meta charset="utf-8">
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
    <title></title>
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
            <li class="nav-item ">
              <a class="nav-link text-light" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="sensors.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="about_us.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active-nav text-light" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section style="padding:2rem; min-height: 70vh; background-color: #ffffff;" class="content-center">
      <div class="container">
          <div class="card">
            <div class="block-weighted">
              <div class="weight-50">
                <label class="h2">SIGN UP</label>
                <form action="process_sign_up.php" method="post">
                  <div class="form-group">
                    <label for="username">Username</label><br>
                    <input class="form-control" type="text" name="username" id="username" pattern="^[^\s].+[^\s]$" title="must be no space in start or end">
                  </div><br>
                  <div class="form-group">
                    <label for="password">Password</label><br>
                    <input class="form-control" type="password" name="password" id="password" pattern="^[^\s].+[^\s]$" title="must be no space in start or end">
                  </div><br>
                  <input class="btn btn-outline-dark" type="submit" name="signUp" value="Sign Up">
                </form>
              </div>
              <div class="weight-50 content-center">
                <img src="assets/WBLogo.png" alt=""><br>
                <a class="link" href="login.php">I already have an account</a>
              </div>

            </div>
          </div>
      </div>
    </section>
    <br><br><br><br><br>
    <?php include("include/footer.php") ?>
  </body>
</html>
