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
            <li><a class="nav-link text-light" href="accounts.php">Accounts</a></li>
            <li><a class="nav-link text-light" href="contact_us.php">Feedback</a></li>
            <li><a class="nav-link active-nav text-light" href="patients.php">Patients</a></li>
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

    <section style="padding-top:2rem; padding-bottom:2rem; min-height: 70vh; background-color: #f8f8f8;" class="content-center">
      <div class="container">
          <div class="card">
            <form action="patients.php" method="post">
              <select class="form-control" name="sectionID" id="sectionID" onchange="this.form.submit()" method="post">
                <option value="None">Select Section Name . . .</option>
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
            </form>
            <?php
              $getAllAccounts = "SELECT * FROM users";

              if(isset($_POST["sectionID"])){
                if($_POST['sectionID'] == "None"){

                }else {
                  $getAllAccounts = $getAllAccounts." WHERE sectionID = '".$_POST["sectionID"] ."'";
                }

              }

              $fetchUsers = mysqli_query($conn, $getAllAccounts);
            ?>
            <table class="table table-striped table-hover" id="userTable">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Contact Number</th>
                  <th>Age</th>
                  <th>Civil Status</th>
                  <th>Gender</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while($user = mysqli_fetch_object($fetchUsers)){
                    ?>
                    <tr>
                      <td><?php echo $user->firstName." ".$user->middleInitial." ".$user->lastName ?></td>
                      <td><?php echo $user->email?></td>
                      <td><?php echo $user->username?></td>
                      <td><?php echo $user->contactNo?></td>
                      <td><?php echo $user->age?></td>
                      <td><?php echo $user->civilStatus?></td>
                      <td><?php echo $user->gender?></td>
                    </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
      </div>
    </section>
    <?php include("../include/admin/footer.php") ?>
    <script>
      $(document).ready(funtion(){
        $('#userTable').DataTable();
      });
    </script>
    <script type="text/javascript">
         document.getElementById('sectionID').value = "<?php if(isset($_POST['sectionID'])){echo $_POST['sectionID'];}else{echo 'None';}?>";
       </script>
  </body>
</html>
