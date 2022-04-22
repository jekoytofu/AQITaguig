<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once("include/header.php") ?>
    <title>LiFECLiCK</title>
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
        <a class="navbar-brand text-light" href="index.php" style="font-weight:600; font-size:40px"><img width="70px" src="assets/logooooo.png" alt="logo">&nbsp;LiFECLiCK</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
              <a class="nav-link active-nav text-light" href="about_us.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="contact_us.php">Contact Us</a>
            </li>
            <?php
              if(isset($session['user'])){
              ?>
              <li class="nav-item">
                <a class="nav-link text-light" href="profile.php"><?php echo "Account Name" ?></a>
              </li>
              <?php
              } else {
              ?>
              <li class="nav-item">
                <a class="nav-link text-light" href="login.php">Log In</a>
              </li>
              <?php
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>
    <section class="our_team" style="padding:2rem;">
      <div class="block-weighted">
        <div class="weight-50 dual-content-left content-center p-1">
          <img src="assets/logooooo.png" loading="lazy" alt="">
        </div>
        <div class="weight-50 content-center p-1">
          <h1 class="h1">Our Company</h1>
          <p class="text-center h5 ">
            LiFECLiCK & Co. is a new start company in the Philippines known for its <br>
            Medical Clock brand of Digital Alarm Clock.<br>
            The company began launching Medical Clock in September 2021.
          </p>
        </div>
      </div>
    </section>
    <section class="our_team" style="padding:2rem;">
      <div class="block-weighted">
        <div class="weight-50 dual-content-left content-center p-1">
          <img src="assets/vvission.png" loading="lazy" width="35%">
        </div>
        <div class="weight-50 content-center p-1">
          <h1 class="h1">Mission and Vission</h1>
          <p class="text-center h5 ">
            Our Mission is to make your medications as efficient as possible, no matter how stressful it is,<br>
            and to enlighten you to adapt to the demands of your very own healthcare.<br>
            <br>
            Our Vision is to make significant contribution to humanity by improving global health.
          </p>
        </div>
      </div>
    </section>
    <section style="padding:2rem;">
      <div class="w-layout-grid grid-3">
        <div class="flex-v">
          <div class="content-center">
            <img src="assets/ter.png" loading="lazy" alt="" width="150px;" style="border-radius: 50%; border: 5px solid gray  ;">
          </div>
          <div class="content-center" style="padding: 2rem; padding-top:0.5rem;">
            <div class="h3 fw-bold text-center">JESTER KYLE SERCEDILLO</div>
            <div class="h5 fw-normal">ORGANIZING MANAGER</div>
            <br>
            <p class="text-center">Along with planning, Jester also ensure a company or departmental unit runs smoothly. Organization isn't just about delegating tasks efficiently and making sure employees have what they need to accomplish their tasks, however. It also need to be able to reorganize in response to new challenges. He is usually responsible for finding investors and external funding opportunities for growing their business, while the controller oversees the expenses and assets of the company.</p>
          </div>
        </div>
        <div class="flex-v">
          <div class="content-center">
            <img src="assets/aye.png" loading="lazy" alt="" width="150px;" style="border-radius: 50%; border: 5px solid gray  ;">
          </div>
          <div class="content-center" style="padding: 2rem; padding-top:0.5rem;">
            <div class="h3 fw-bold text-center">AYEZZA SALVAE DUTERTE</div>
            <div class="h5 fw-normal">PLANNING MANAGER</div>
            <br>
            <p class="text-center">Ayezza is the one creating a plan to meet company goals and objectives. It involves allocating employee resources and delegating responsibilities, as well as setting realistic timelines and standards for completion. Ayezza requires those in management roles to continuously check on team progress in order to make small adjustments when necessary, while still maintaining a clear picture of a company's larger aims and goals.</p>
          </div>
        </div>
        <div class="flex-v">
          <div class="content-center">
            <img src="assets/tine.png" loading="lazy" alt="" width="150px;" style="border-radius: 50%; border: 5px solid gray ;">
          </div>
          <div class="content-center" style="padding: 2rem; padding-top:0.5rem;">
            <div class="h3 fw-bold text-center">CHRISTINE JANE CERDINA</div>
            <div class="h5 fw-normal">MARKETING MANAGER</div>
            <br>
            <p class="text-center">Christine is the one who oversees the entire marketing department, depending on the size of the company. In smaller businesses, the marketing manager may be the only top-level business role in charge of directing marketing efforts. She is also incharge in HR this business role is crucial for operations because they recruit, interview, hire and onboard employees.</p>
          </div>
        </div>
        <div class="flex-v">
          <div class="content-center">
            <img src="assets/ish.png" loading="lazy" alt="" width="150px;" style="border-radius: 50%; border: 5px solid gray  ;">
          </div>
          <div class="content-center" style="padding: 2rem; padding-top:0.5rem;">
            <div class="h3 fw-bold text-center">TRISHA ABELLO</div>
            <div class="h5 fw-normal">FINANCE MANAGER</div>
            <br>
            <p class="text-center">Trisha the Finance manager usually analyze costs and revenue and use this data to prepare financial reports. In smaller organizations, this business role may oversee several financial aspects of business operations, such as calculating and projecting incoming revenue and company expenses. She also oversees the day-to-day transactions of companies, including sales transactions, expense payments and tax reporting.</p>
          </div>
        </div>
        <div class="flex-v">
          <div class="content-center">
            <img src="assets/mats.png" loading="lazy" alt="" width="150px;" style="border-radius: 50%; border: 5px solid gray ;">
          </div>
          <div class="content-center" style="padding: 2rem; padding-top:0.5rem;">
            <div class="h4 fw-bold text-center">JOHN CEDRICK MATA</div>
            <div class="h5 fw-normal">BUSINESS ANALYST</div>
            <br>
            <p class="text-center">Many companies employ business analysts who are responsible for evaluating the growth and development of the business. Cedrick analyzes market trends, projects future revenue and develops plans that help businesses track profitability, product viability and the overall success of operations. He commonly integrate new technology trends and ensure any technology they introduce meets the needs of their company.</p>
          </div>
        </div>
      </div>
    </section>
    <section style="padding:2rem;">
      <table>
        <div class="slideshow-container">
        <center><h2><br>REVIEWS</h2></center>
          <!-- Full-width slides/quotes -->
          <div class="mySlides">
            <center><img src = "assets/tertito.png" height="100" width="100"></center><br>
            <q>Easy to use app, very useful for me because I living alone and when I'm sick no one is around remind me to takes meds but with this app it all change, I can take my meds on time.</q>
            <h6 class="author">- Juanito Galpo<br><br></h6><br>
          </div>

          <div class="mySlides">
            <center><img src = "assets/matsmama.png" height="100" width="100"></center><br>
            <q>I am very satisfied with this app, last week my son got sick and I have to attend my seminar and no one around to remind him to take medicine but with this app<br> I set a time and how much meds he will take, and when the time I came home I check the app and it records that my son take the medicine on time.</q><br>
            <h6 class="author"> - Susan Mata<br><br></h6>
          </div>

          <div class="mySlides">
            <center><img src = "assets/mamag.png" height="100" width="100"></center><br>
            <q>This app is great for all people. People who need assistance for taking their medications, their maintenance and vitamins, this app is very nice. Thank you!</q><br>
            <h6 class="author">- Gina Sercedillo<br><br></h6>
          </div>

          <div class="mySlides">
            <center><img src = "assets/ishmama.png" height="100" width="100"></center><br>
            <q>Not a bad one. If they will add more use of it like picking some other music for alarm and adding pictures of the medicine would be nice.</q><br>
            <h6 class="author">- Rosario Abello<br><br></h6>
          </div>

          <div class="mySlides">
            <center><img src = "assets/tinecous.png" height="100" width="100"></center><br>
            <q>Nice app. It's very easy to use, very reliable and keeps me on track with my medication.<br>
        A must have app specially with someone forgetful like me haha.</q><br>
            <h6 class="author">- Shane Aubbrey San Pedro<br><br></h6>
          </div>

          <div class="mySlides">
            <center><img src = "tinelola.png" height="100" width="100"></center><br>
            <q>I've tried a lot of apps with a similar purpose but this is the best so far. It is so easy to use and has labels thank you creators!!!</q><br>
            <h6 class="author">- Lilia Botalon<br><br></h6>
          </div>


          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div class="dot-container">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
          <span class="dot" onclick="currentSlide(4)"></span>
          <span class="dot" onclick="currentSlide(5)"></span>
          <span class="dot" onclick="currentSlide(6)"></span>
        </div>
      </table>
    </section>
    <footer class="footer">
    	 <div class="container">
    	 	<div class="row">
    	 		<div class="footer-col">
    	 			<h4>company</h4>
    	 			<ul>
    	 				<li><a href="#">about us</a></li>
    	 				<li><a href="#">our services</a></li>
    	 				<li><a href="#">privacy policy</a></li>
    	 				<li><a href="#">affiliate program</a></li>
    	 			</ul>
    	 		</div>
    	 		<div class="footer-col">
    	 			<h4>get help</h4>
    	 			<ul>
    	 				<li><a href="#">FAQ</a></li>
    	 				<li><a href="#">shipping</a></li>
    	 				<li><a href="#">returns</a></li>
    	 				<li><a href="#">order status</a></li>
    	 				<li><a href="#">payment options</a></li>
    	 			</ul>
    	 		</div>
    	 		<div class="footer-col">
    	 			<h4>online shop</h4>
    	 			<ul>
    	 				<li><a href="#">watch</a></li>
    	 				<li><a href="#">bag</a></li>
    	 				<li><a href="#">shoes</a></li>
    	 				<li><a href="#">dress</a></li>
    	 			</ul>
    	 		</div>
    	 		<div class="footer-col">
    	 			<h4>follow us</h4>
    	 			<div class="social-links">
    	 				<a href="#"><i class="fab fa-facebook-f"></i></a>
    	 				<a href="#"><i class="fab fa-twitter"></i></a>
    	 				<a href="#"><i class="fab fa-instagram"></i></a>
    	 				<a href="#"><i class="fab fa-linkedin-in"></i></a>
    	 			</div>
    	 		</div>
    	 	</div>
    	 </div>
      <center><small class="d-block mb-3 text-muted"><h6>&copy; 2021 LiFECLiCK<h6></small></center>
    </footer>

  </body>
  <script>
    var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
  }
  </script>
</html>
