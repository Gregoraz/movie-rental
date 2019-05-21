<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.1.3.css">
</head>

<body>
    <?php
    require('../connection.php');
    session_start();
    //$_SESSION["logged"] = 0;
    if(isset($_SESSION["logged"])) {
   // var_dump($_SESSION["logged"]);
    $sql = "SELECT employeeID, firstname, lastname FROM employee WHERE employeeID=".$_SESSION['logged'].";";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    
    if(isset($_SESSION["logged"]) && $_SESSION["logged"] != 0) {
        echo '
    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills">
            <li class="nav-item"> <a href="../index.php" class="nav-link disabled">Home</a> </li>
            <li class="nav-item"> <a href="index.php" class="nav-link active">Admin Panel: '.$_SESSION["employee"].'</a> </li>
            <li class="nav-item"> <a href="logout.php" class="nav-link disabled">Logout<br></a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12"><img class="img-fluid d-block rounded-circle mx-auto" src="../images/paneladmin.jpg" width="250" height="250"></div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="heading-2" contenteditable="true">Welcome to Panel Admin, '.$row["firstname"].' '.$row["lastname"].'!</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 border rounded"><img class="img-fluid d-block rounded-circle mx-auto" src="../images/movies.png" width="140" height="140">
          <h2 class="text-center">Movie manage</h2>
          <ul class="">
            <li class="text-left">Add new movie</li>
            <li>Edit movie</li>
            <li>Delete movie</li>
          </ul>
          <div class="row">
            <div class="col-md-12 text-center"><a class="btn btn-secondary" href="movies.php">Manage</a></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-12 border rounded"><img class="img-fluid d-block rounded-circle mx-auto" src="../images/customer.png" width="140" height="140">
            <h2 class="text-center">Customer manage</h2>
            <ul class="">
              <li class="text-left">Add new user</li>
              <li>Edit user</li>
              <li>Delete user</li>
            </ul>
            <div class="row">
              <div class="col-md-12 text-center"><a class="btn btn-secondary" href="customers.php">Manage</a></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 border rounded">
          <div class="col-md-12"><img class="img-fluid d-block rounded-circle mx-auto" src="../images/director.jpg" width="140" height="140">
            <h2 class="text-center">Stage director manage</h2>
            <ul class="">
              <li class="text-left">Add new stage director</li>
              <li>Edit stage director</li>
              <li>Delete stage director</li>
            </ul>
            <div class="row">
              <div class="col-md-12 text-center"><a class="btn btn-secondary" href="directors.php">Manage</a></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-12 border rounded"><img class="img-fluid d-block rounded-circle mx-auto" src="../images/order.jpg" width="140" height="140">
            <h2 class="text-center">Orders</h2>
            <ul class="">
              <li class="text-left">Create new order</li>
              <li class="text-left">Print receipt</li>
              <li class="text-left">Delete past orders</li>
            </ul>
            <div class="row">
              <div class="col-md-12 text-center"><a class="btn btn-secondary" href="orders.php">Orders</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center"><a class="btn btn-secondary" href="logout.php">Log out</a></div>
      </div>
    </div>
  </div>';
    }
        }
    
        else {
        echo'
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills">
            <li class="nav-item"> <a href="../index.php" class="nav-link disabled">Home</a> </li>
            <li class="nav-item"> <a href="index.php" class="nav-link active">Admin Panel<br></a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12"><img class="img-fluid d-block rounded-circle mx-auto" src="../images/paneladmin.jpg" width="250" height="250"></div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="text-center">You have to log in first to enter Admin Panel&nbsp;<span class="badge badge-pill badge-warning">!</span></h2>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mx-auto col-md-12 col-10 bg-white p-5">
            <h3 class="display-4 text-center">Log in</h3>
            <form action="login.php" method="post">
              <div class="form-group text-center"> <input type="email" class="form-control form-control-lg" placeholder="Enter email" id="emaillogin" name="emaillogin" required="required"> </div>
              <div class="form-group mb-3"> <input type="password" class="form-control form-control-lg" placeholder="Password" id="passwordlogin" name="passwordlogin" required="required"> <small class="form-text text-muted text-right">
                  <a href="register.php"> Dont have an account? Click here to create.</a>
                </small> </div> <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>';
    }
    ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>