<?php session_start();
require_once("../include/config.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php require_once("../include/admin/header.php") ?>
    <?php if(!isset($_SESSION['username'])){header('Location: ../login.php');} ?>
    <?php if(isset($_SESSION['role'])){if($_SESSION['role']=='user'){header('Location: ../welcome.php');}} ?>
    <meta charset="utf-8">
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
            <li><a class="nav-link text-light" href="dashboard.php">Dashboard</a></li>
            <li><a class="nav-link active-nav text-light" href="accounts.php">Accounts</a></li>
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
        <div class="weight-50">
          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="add_user.php">User</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" class="link-info" style="color: #80bdff;" href="add_admin.php">Admin</a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" class="link-info" style="color: #8c8c89;" href="accounts.php">Accounts</a>
                </li>
              </ul>
                </div>
              <div class="card-body">
                <label class="h2">Add User</label>
                <form action="process_add_user.php" method="post">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-4">
                        <label for="fName">First Name</label><br>
                        <input class="form-control" type="text" name="fName" id="fName  " pattern="^[^\s].+[^\s]$" title="must be no space in start or end">
                      </div>
                      <div class="col-sm-3">
                        <label for="middleInitial">Middle Initial</label><br>
                        <input class="form-control" type="text" name="middleInitial" id="middleInitial">
                      </div>
                      <div class="col-sm-4">
                        <label for="lName">Last Name</label><br>
                        <input class="form-control" type="text" name="lName" id="lName">
                      </div>
                    </div>
                  </div><br>
                  <div class="form-group">
                    <label for="age">Age</label><br>
                    <input class="form-control" type="number" name="age" id="age" min=1>
                  </div><br>
                  <div class="form-group">
                    <label for="gender">Gender</label><br>
                    <select class="form-control" name="gender" id="gender">
                      <option hidden>- Select Option -</option>
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </div><br>
                  <div class="form-group">
                    <label for="civilStatus">Civil Status</label><br>
                    <select class="form-control" type="text" name="civilStatus" id="civilStatus">
                      <option hidden>- Select Option -</option>
                      <option>Single</option>
                      <option>Married</option>
                      <option>Divorced</option>
                      <option>Widowed</option>
                    </select>
                  </div><br>
                  <div class="form-group">
                    <label for="email">Email</label><br>
                    <input class="form-control" type="email" name="email" id="email">
                  </div><br>
                  <div class="form-group">
                    <label for="contactNo">Contact Number</label><br>
                    <input class="form-control" type="text" maxlength = "11" name="contactNo" id="contactNo">
                  </div><br>
                  <div class="form-group">
                    <label for="address">Address</label><br>
                    <input class="form-control" type="text" name="address" id="address">
                  </div><br>
                  <div class="form-group">
                    <label for="sectionID">Section</label><br>
                    <select class="form-control" name="sectionID">
                      <option hidden>- Select Option -</option>
                      <?php
                        $getSections = "SELECT * FROM sections";
                        $result = mysqli_query($conn, $getSections);
                        while($section = mysqli_fetch_object($result)){
                          ?>
                            <option value="<?php echo $section->id?>"><?php echo $section->sectionName ?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </div><br>
                  <div class="form-group">
                    <label for="username">Username</label><br>
                    <input class="form-control" type="text" name="username" id="username">
                  </div><br>
                  <div class="form-group">
                    <label for="password">Password</label><br>
                    <input class="form-control" type="password" name="password" id="password">
                  </div><br>
                  <input class="btn btn-outline-dark" type="submit" name="signUp" value="Add Account">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
    <?php include("../include/admin/footer.php") ?>
    <script>
      $(document).ready(funtion(){
        $('#userTable').DataTable();
      });
    </script>
  </body>
</html>
