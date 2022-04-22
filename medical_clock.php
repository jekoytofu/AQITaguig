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
    <?php if(!isset($_SESSION['username'])){header('Location: login.php');} ?>
    <title>LiFECLiCK</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mediclock.css">
    <link rel="stylesheet" href="css/tiny-slider.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/venobox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/default.css">
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
    <nav class="navbar navbar-expand-lg navbar-light top-nav" style="background-color: #43609C;">
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
              <a class="nav-link active-nav text-light" href="medical_clock.php">Medical Clock</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="about_us.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="contact_us.php">Contact Us</a>
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
  </div>
    <div class="header-hero" data-scroll-index="0">
    <section> <br>
      <div class="shape shape-1"></div>
      <div class="shape shape-2"></div>
      <div class="shape shape-3"></div>
      <div class="shape shape-4"></div>
      <div class="shape shape-5"></div>
      <div class="shape shape-6"></div>
      <div class="container">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
          <div class="col-lg-6 col-md-10">
            <div class="header-hero-content">
              <h1 class="header-title wow fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0.2s"><span>Take Your Medication</span> With LiFE CLiCK's Medical Clock</h1>
              <p class="text wow fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0.4s">Medical Clock is an Android App Project is a native android application meant
              to aid the patients of Covid - 19 most preferably the Asymptomatic to remember to take their daily medications.
              <br><br>
              It is also designed for users who need a little help
              keeping track of their medication schedule and who are dedicated to keeping the
              schedule. The application allows the user to store pill objects and multiple alarms
              for those pills.</p>
              <ul class="d-flex">
                <li><a href="MobileApp/Medi_Clock.apk" class="main-btn wow fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0.8s">Download
                    Now</a></li>
                <li><a href="https://https://youtu.be/dK6wG0GonOM" class="header-video venobox wow fadeInLeftBig"
                    data-autoplay="true" data-vbtype="video" data-wow-duration="3s" data-wow-delay="1.2s"><i
                      class="fas fa-play"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="header-image">
              <img src="assets/App-image.png" alt="" class="image-1 wow fadeInRIghtBig"
              data-wow-duration="3s" data-wow-delay="0.5s">
            </div>
          </div>
        </div>
      </div>
      <div class="container">
          <div class="header-shape-2">
          <img src="assets/img/header/header-shape-2.svg" alt="">
          </div>
        </div>
      </div>
      <!---- home star ------>
      </header>
      <!--------   Header End ----  -->

      <!-- ------- Feature Section Start ---------- -->
      <section class="feature-section pt-80" data-scroll-index="1">
      <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-7">
          <div class="section-title text-center mb-30">
            <h1 class="mb-25  wow fadeInUp" data-wow-delay=".2s">Awesome <span> Features</span></h1>
            <p class="wow fadeInUp" data-wow-delay=".4s">Alarms have one time of day and can occur on multiple days of the week.
            The user is able to view their pills in a today view and can select date to view medicines.
            In addition, the application stores the history of when each medication was taken;
            this will aid the user in keeping track of their medication usage.
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4">
          <div class="single-feature wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.2s">
            <div class="icon color-1">
              <i class="fas fa-hand-pointer"></i>
            </div>
            <div class="content">
              <h3>Easy To Use</h3>
              <p>Medical Clock is designed to be a user friendly application where you could easily use with even less knowledge on other application.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="single-feature wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.4s">
            <div class="icon color-2">
              <i class="fas fa-hand-holding-usd"></i>
            </div>
            <div class="content">
              <h3>Save Your Money</h3>
              <p>It's free. Our application is designed to help those who are in need given the situation nowadays, people need a helping hand and our app got you!.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="single-feature wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.6s">
            <div class="icon color-3">
              <i class="fas fa-clock"></i>
            </div>
            <div class="content">
              <h3>Click and Wait</h3>
              <p>Just with simple clicks, you can set your alarm and get on with your day. <br>
                "Time is the most valuable thing a man can spend." -Theophrastus.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
      </section>
      <!-- ------- Feature Section End ---------- -->

      <br>


      <!-- ----------- Testimonial Section Start ------- -->
      <section class="testimonial-section" data-scroll-index="3">
      <div class="container">
      <div class="row justify-content-center testimonial-active-wrapper">
        <div class="col-xl-6 col-lg-7">
          <div class="section-title text-center mb-60">
            <h1 class="mb-25 text-white wow fadeInUp" data-wow-delay=".2s">What Our Client Says</h1>
            <p class="text-white wow fadeInUp" data-wow-delay=".4s">It is extremely important to us that our customers' opinions are heard and valued. As a result, we keep their feedback and use it as constructive criticism to improve the applications that we provide to them. </p>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-8">
            <div class="testimonial-active">
              <div class="testimonial-wrapper">
                <div class="single-testimonial">
                  <div class="info">
                    <div class="image-2">
                      <img src="assets/tertito.png" alt="">
                    </div>
                    <h4>Juanito Galpo</h4>
                    <div class="quote">
                      <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="content">
                      <p>Easy to use app, very useful for me because I'm living alone and when
                         I'm sick no one is around to remind me to take my meds but with this app it all changed, I can take my meds on time.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonial-wrapper">
                <div class="single-testimonial">
                  <div class="info">
                    <div class="image-2">
                      <img src="assets/matsmama.png" alt="">
                    </div>
                    <h4>Susan Mata</h4>
                    <div class="quote">
                      <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="content">
                      <p>I am very satisfied with this app, last week my son got sick and I have to attend my seminar and no one around to remind him to take medicine but with this app<br> I set a time and how much meds he will take, and when the time I came home I check the app and it records that my son take the medicine on time.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonial-wrapper">
                <div class="single-testimonial">
                  <div class="info">
                    <div class="image-2">
                      <img src="assets/mamag.png" alt="">
                    </div>
                    <h4>Gina Sercedillo</h4>
                    <div class="quote">
                      <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="content">
                      <p>This app is great for all people. People who need assistance for taking their medications, their maintenance and vitamins, this app is very nice. Thank you!</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonial-wrapper">
                <div class="single-testimonial">
                  <div class="info">
                    <div class="image-2">
                      <img src="assets/ishmama.png" alt="">
                    </div>
                    <h4>Rosario Abello</h4>
                    <div class="quote">
                      <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="content">
                      <p>Not a bad one. If they will add more use of it like picking some other music for alarm and adding pictures of the medicine would be nice.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonial-wrapper">
                <div class="single-testimonial">
                  <div class="info">
                    <div class="image-2">
                      <img src="assets/tinecous.png" alt="">
                    </div>
                    <h4>Shane Aubbrey San Pedro</h4>
                    <div class="quote">
                      <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="content">
                      <p>Nice app. It's very easy to use, very reliable and keeps me on track with my medication.<br>
                  A must have app specially with someone forgetful like me haha.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonial-wrapper">
                <div class="single-testimonial">
                  <div class="info">
                    <div class="image-2">
                      <img src="assets/lolatine.png" alt="">
                    </div>
                    <h4>Lilia Botalon</h4>
                    <div class="quote">
                      <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="content">
                      <p>I've tried a lot of apps with a similar purpose but this is the best so far. It is so easy to use and has labels thank you creators!!!</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>
      <!-- ----------- Testimonial Section End ------- -->



      <!-- ----------- Download Section Start ------- -->
      <section class="download-area pt-70 pb-40" data-scroll-index="6">
      <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-md-9">
          <div class="download-image mt-50 wow fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0.5s">
            <div class="download-shape-1"></div>
            <img src="assets/app-image.png" alt="" class="image-3">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="download-content mt-45 wow fadeInRightBig" data-wow-duration="3s" data-wow-delay="0.5s">
            <h1 class="title">Download and Start Using!</h1>
            <p class="text">Medical Clock, a good help in keeping track of time when taking medications, something that everyone can get hope and aid while joining them on their recovery journey.!</p>
          </div>
        </div>
      </div>
      </div>
      </section>
      <!-- ----------- Download Section End ------- -->
    </section>
      <?php include("include/footer.php") ?>

      <!-- - - - -  jquery Js - - - -  -->
      <script src="js/jquery-1.12.4.min.js"></script>
      <!-- - - - - venobox js - - - - -  -->
      <script type="text/javascript" src="js/venobox.min.js"></script>
      <!-- - - - - -  wow js - - - - -  -->
      <script src="js/wow.min.js"></script>
      <!-- - - - - -  tiny slider js - - - - - -->
      <script src="js/tiny-slider.js"></script>
      <!-- - - - - - scrollit js - - - - - -->
      <script src="js/scrollIt.min.js"></script>
      <!-- - - - font awsome js - - - - -->
      <script src="js/all.js"></script>
      <!-- - - Bootstrap Js - - -->
      <script src="js/bootstrap.min.js"></script>
      <!-- - - - - main js - - -->
      <script src="js/main.js"></script>
  </body>
</html>
