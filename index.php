<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css">
</head>

<body class="">
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills">
            <li class="nav-item"> <a href="index.php" class="active nav-link">Home</a> </li>
            <?php
              session_start();
              if(isset($_SESSION["logged"])) echo 
            '<li class="nav-item" style="float:right;"> <a href="admin/index.php" class="nav-link disabled">Admin Panel: ' .$_SESSION["employee"]. '<br></a> </li>
             <li class="nav-item"> <a href="admin/logout.php" class="nav-link disabled">Logout<br></a> </li>';
              else echo '<li class="nav-item"> <a href="admin/index.php" class="nav-link disabled">Admin Panel<br></a> </li>';
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>Welcome to Movie Rental Worcester website!</h1><img class="img-fluid d-block mx-auto" src="images/movie.png" width="250" height="250">
          <p class="">We are a company that rents movies for a given period of time at low prices. The company is located in Worcester. On our website you have the opportunity to browse the database of our films. If you want to rent a movie and it is available, please contact the service in our office.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card"> <img class="card-img-top" src="images/movies.png" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Browse movies</h2>
              <p class="card-text">See the movies in our database. Check availability of the movie and the price.</p> <a href="movies.php" class="btn btn-primary">Browse</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card"> <img class="card-img-top" src="images/director.jpg" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Browse stage directors</h2>
              <p class="card-text">Check stage directors and browse movies of the same stage director</p> <a href="directors.php" class="btn btn-primary">Browse</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card"> <img class="card-img-top" src="images/genre.jpg" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Browse movie genres</h2>
              <p class="card-text">Check movie genres and browse movies of the same genre</p> <a href="genres.php" class="btn btn-primary">Browse</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" style=""></script>
</body>

</html>