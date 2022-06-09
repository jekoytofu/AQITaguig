<?php session_start();
require_once("include/config.php"); ?>

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
    <meta charset="utf-8">
    <title>Accounts</title>
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
        <a class="navbar-brand text-light" href="index.php" style="font-weight:600; font-size:40px"><img width="70px" src="assets/CVAQILOGO.png" alt="logo">&nbsp;CV Air Quality</a>
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
              <a class="nav-link text-light" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="about_us.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active-nav text-light" href="welcome.php">Account</a>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php
      $getAllAccounts = "SELECT * FROM users ORDER BY role ASC";

      if(isset($_POST["role"])){
        $getAllAccounts = $getAllAccounts." WHERE role = '".$_POST["role"] ."'";
      }
      $fetchUsers = mysqli_query($conn, $getAllAccounts);
    ?>
    <section style="padding-top:2rem; padding-bottom:2rem; min-height: 70vh; background-color: #ffffff;" class="content-center">
        <div class="weight-50">
          <div class="card">
            <div class="d-flex">
                <button class="btn btn-outline-info" type="button" name="button" style="border-radius:50px; font-size: 20px;"><a href="add_user.php" class="text-dark" style="text-decoration: none"><i class="fas fa-user-circle"></i> Add Account</button>
              </a>
            </div>
            <table class="table table-striped table-hover" id="userTable">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Operations</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while($user = mysqli_fetch_object($fetchUsers)){
                    $getAllSections = "SELECT * FROM sections";
                    $fetchSections= mysqli_query($conn, $getAllSections);
                    ?>
                    <tr>
                      <td><?php echo $user->username?></td>
                      <td nowrap="nowrap">
                        <a href ="edit_account.php?id=<?php echo $user->id?>&lastName=<?php echo $user->lastName?>" class="btn btn-primary btn-sm"><i class="fas fa-user-edit"></i> Update</a>
                        <a id="delete_account" href = "remove.php?id=<?php echo $user->id?>&lastName=<?php echo $user->lastName?>" class="btn btn-danger btn-sm"><i class="fas fa-eraser"></i> Remove</a>
                      </td>
                    </tr>
                    <?php
                  }
                  $conn->close();
                ?>
              </table>
              </tbody>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br><br><br><br><br>
  <?php include("script.php"); ?>
  <script type = "text/javascript">
      $(document).ready(function() {
          function disableBack() { window.history.forward() }

          window.onload = disableBack();
          window.onpageshow = function(evt) { if (evt.persisted) disableBack() }

          $('#delete_account').click(function(event) {
            event.preventDefault();
            var delete_func = confirm("Are you sure you want to delete this record?")
            if(delete_func){
              window.location = $(this).attr("href");
            }
          })
      });
    </script>
    <?php include("include/footer.php") ?>
    <script>
      $(document).ready(funtion(){
        $('#userTable').DataTable();
      });
    </script>
  </body>
</html>
