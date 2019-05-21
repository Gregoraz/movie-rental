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
    if(isset($_SESSION["logged"])) header("Location: index.php");
    
    ?>
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
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12"><img class="img-fluid d-block rounded-circle mx-auto" src="../images/register.png" width="250" height="250"></div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-4 text-center">Register</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form id="register" name="register" action="registerproceed.php" method="post">
            <h6 class="">Customer</h6>
            <div class="form-group"> <input type="text" class="form-control form-control-lg" placeholder="Enter first name" id="firstname" name="firstname" required="required"> </div>
            <h6 class="">Last name</h6>
            <div class="form-group"> <input type="text" class="form-control form-control-lg" placeholder="Enter last name" name="lastname" id="lastname" required="required"> </div>
            <h6 class="">Email</h6>
            <div class="form-group"> <input type="email" class="form-control form-control-lg" placeholder="Enter email address" name="email" id="email" required="required"> </div>
            <h6 class="">Password</h6>
            <div class="form-group"> <input type="password" class="form-control form-control-lg" placeholder="Enter password" id="password" name="password" required="required"> </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center"><a class="btn btn-secondary" href="index.php">&lt;&lt; Back</a></div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>