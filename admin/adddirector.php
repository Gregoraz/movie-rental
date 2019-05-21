<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.1.3.css">
</head>

<body>
   
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills">
            <li class="nav-item"> <a href="../index.php" class="nav-link disabled">Home</a> </li>
            <?php
              session_start();
              
              if(isset($_SESSION["logged"])) echo '
              <li class="nav-item"> <a href="index.php" class="nav-link active">Admin Panel: '.$_SESSION["employee"].'</a> </li>
                 <li class="nav-item"> <a href="logout.php" class="nav-link disabled">Logout<br></a> </li>
              ';
              
              else header("Location: index.php");
              ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-4 text-center">Add new stage director</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form id="adddirector" name="adddirector" action="adddirectorproceed.php" method="post">
            <h6 class="">First name</h6>
            <div class="form-group"> <input type="text" class="form-control form-control-lg" placeholder="Enter first name" id="dfirstname" name="dfirstname" required="required"> </div>
            <h6 class="">Last name</h6>
            <div class="form-group"> <input type="text" class="form-control form-control-lg" placeholder="Enter last name" id="dlastname" name="dlastname" required="required"> </div>
            <h6 class="">Country</h6>
            <div class="form-group"> <input type="text" class="form-control form-control-lg" placeholder="Enter stage directors country" id="dcountry" name="dcountry" required="required"> </div>
            <h6 class="">Count of movies</h6>
            <div class="form-group"> <input type="text" class="form-control form-control-lg" placeholder="Enter stage directors movie count" id="dmovies" name="dmovies" required="required"> </div>
            <button type="submit" class="btn btn-primary">+&nbsp;Add stage director</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center"><a class="btn btn-secondary" href="directors.php">&lt;&lt; Back</a></div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
</body>

</html>