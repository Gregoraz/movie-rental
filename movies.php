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
        <div class="col-md-12">
          <h1 class="display-4 text-center">List of the movies</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card text-white bg-secondary mb-3">
            <div class="card-header">Hint</div>
            <div class="card-body">
              <h5 class="card-title">To see movie details, please click on the movie name</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4 text-center">
          
            <a class="btn btn-primary" type="button" href="movies.php">Show all</a>
            <a class="btn btn-primary" type="button" href="movies.php?available=true">Available only</a>
          
        </div>
        <div class="col-md-4 text-center">
          <div class="btn-group">
            <button type="button" class="btn btn-primary">Genre</button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false"></button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(128px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
              <a class="dropdown-item" href="movies.php?genre=0">Action</a>
              <a class="dropdown-item" href="movies.php?genre=1">Adventure</a>
              <a class="dropdown-item" href="movies.php?genre=2">Comedy</a>
              <a class="dropdown-item" href="movies.php?genre=3">Crime</a>
              <a class="dropdown-item" href="movies.php?genre=4">Drama</a>
              <a class="dropdown-item" href="movies.php?genre=5">Historical</a>
              <a class="dropdown-item" href="movies.php?genre=6">Horror</a>
              <a class="dropdown-item" href="movies.php?genre=7">Science Fiction</a>
              <a class="dropdown-item" href="movies.php?genre=8">Western</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="movies.php">Any</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="btn-group">
            <button type="button" class="btn btn-primary">Price</button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false"></button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(128px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
              <a class="dropdown-item" href="movies.php?price=0">Up to £1 per day</a>
              <a class="dropdown-item" href="movies.php?price=1">Up to £2 per day</a>
              <a class="dropdown-item" href="movies.php?price=2">Up to £3 per day</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="movies.php">Any</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered ">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Movie Name</th>
                  <th>Stage Director</th>
                  <th>Genre</th>
                  <th>Year</th>
                  <th>Price</th>
                  <th>Availability</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  require('connection.php');
                  
                  $addition="";
                  
                  if(isset($_GET['genre'])) {
                      switch($_GET['genre']) {
                          case 0:
                              $addition = "WHERE movie.genreID = " . $_GET["genre"];
                          case 1:
                              $addition = "WHERE movie.genreID = " . $_GET["genre"];
                          case 2:
                              $addition = "WHERE movie.genreID = " . $_GET["genre"];
                          case 3:
                              $addition = "WHERE movie.genreID = " . $_GET["genre"];
                          case 4:
                              $addition = "WHERE movie.genreID = " . $_GET["genre"];
                          case 5:
                              $addition = "WHERE movie.genreID = " . $_GET["genre"];
                          case 6:
                              $addition = "WHERE movie.genreID = " . $_GET["genre"];
                          case 7: 
                              $addition = "WHERE movie.genreID = " . $_GET["genre"];
                              
                          case 8:
                              $addition = "WHERE movie.genreID = " . $_GET["genre"];
                            
                      }
                  }
                  
                  if(isset($_GET['director'])) {
                      $addition = "WHERE movie.stagedirectorID = " .$_GET["director"];
                  }
                  
                  if(isset($_GET["price"])) {
                      if($_GET["price"] == 0) $addition = "WHERE movie.priceperday < 2";
                      if($_GET["price"] == 1) $addition = "WHERE movie.priceperday < 3";
                      if($_GET["price"] == 2) $addition = "WHERE movie.priceperday < 4";
                  }
                  
                  if(isset($_GET["available"])) $addition = "WHERE movie.rentedtill < CURDATE() OR movie.rentedtill IS NULL";
            
                    
                  
                  
                  

                  $sql = "
                  SELECT movie.movieID, movie.priceperday, movie.name, stagedirector.firstname, stagedirector.lastname, genre.genrename, YEAR(movie.releasedate) AS releasedate, movie.rentedtill 
                  FROM movie
                  INNER JOIN stagedirector
                  ON movie.stagedirectorID = stagedirector.directorID
                  LEFT OUTER JOIN genre
                  ON movie.genreID = genre.genreID " . $addition . "
                  ORDER BY movie.movieID
                  ;";
                  $result = $conn->query($sql);
                  $availability = "";
                

                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    if ($row["rentedtill"] == NULL) $availability = "Available";
                        //if date is not null then
                        else {
                        $now = new DateTime();
                        $rented = new DateTime($row["rentedtill"]);
                        if ($rented < $now) $availability = "Available";
                        else $availability = "Rented";
                    }
                    echo "<tr><td>" . $row["movieID"]. "</td><td><a href=movie.php?id=" .$row["movieID"] . ">" . $row["name"]. "</a></td><td> " . $row["firstname"] . " " . $row["lastname"] . "</td><td>" . $row["genrename"]. "</td><td class>" . $row["releasedate"] . "</td><td>£" . $row["priceperday"] . " per day</td><td>". $availability . "</td></tr>";
    }
} else {
    echo "0 results";
}
?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center"><a class="btn btn-secondary text-center" href="index.php">&lt;&lt; Back</a></div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>