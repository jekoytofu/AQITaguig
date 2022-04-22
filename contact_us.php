<?php
  session_start();

  if(isset($_SESSION['feedbackSuccess'])){
    ?>
      <script type="text/javascript">
        alert("<?php echo $_SESSION['feedbackSuccess'] ?>");
      </script>
    <?php
    unset($_SESSION["feedbackSuccess"]);
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include("include/header.php") ?>
    <?php if(!isset($_SESSION['username'])){header('Location: login.php');} ?>
    <?php if(isset($_SESSION['role'])){if($_SESSION['role']=='admin'){header('Location: admin/welcome.php');}} ?>
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
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light top-nav" style="background-color: #43609C;  ">
      <div style="flex-basis: 50%;">
        <a class="navbar-brand text-light" href="index.php" style="font-weight:600; font-size:40px"><img width="70px" src="assets/logooooo.png" alt="logo">&nbsp;LiFECLiCK</a>
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
              <a class="nav-link text-light" href="medical_clock.php">Medical Clock</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="about_us.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light active-nav" href="contact_us.php">Contact Us</a>
            </li>
            <li class="nav-item">
            <?php
              if(isset($_SESSION['username'])){
                if(isset($_SESSION['role'])){
                  if($_SESSION['role'] == 'admin'){
                    ?>
                      <a class="nav-link text-light" href="admin/welcome.php"><?php echo $_SESSION['username'] ?></a>
                    <?php
                  } else {
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

    <section style="padding:2rem;">
      <div class="block-weighted">
        <div class="weight-50 dual-content-left content-center">
          <img style="width:400px;" src="assets/logooooo.png" alt="">
        </div>
        <div class="weight-50">
          <form action="send_feedback.php" method="post">
            <div class="form-group">
              <label for="" >First Name</label><br>
              <input name="fName" pattern="^[^\s].+[^\s]$" title="must be no space in start or end" class="form-control contact-input" type="text" name="" value="" required>
            </div>
            <div class="form-group">
              <label for="" >Last Name</label><br>
              <input name="lName" pattern="^[^\s].+[^\s]$" title="must be no space in start or end" class="form-control contact-input" type="text" name="" value="" required>
            </div>
            <div class="form-group">
              <label for="" >Contact No.</label><br>
              <input name="contactNo" pattern="^[^\s].+[^\s]$" title="must be no space in start or end" class="form-control contact-input" type="text" name="" value="" required>
            </div>
            <div class="form-group">
              <label for=""> Email</label><br>
              <input name="email" pattern="^[\w.]+@[\w.-]+\.[a-z]{2,3}$" title="Invalid Email Format" class="form-control contact-input" type="text" name="" value="" required>
            </div>
            <div class="form-group">
              <label for="" >Feedback</label><br>
              <textarea name="feedback" pattern="^[^\s].+[^\s]$" title="must be no space in start or end" class="form-control contact-input" type="text" name="" value="" required></textarea>
            </div>

            <input class="btn btn-outline-dark" type="submit" name="" value="Send">
          </form>
        </div>

      </div>
    </section>

    <?php include("include/footer.php") ?>
  </body>
</html>
