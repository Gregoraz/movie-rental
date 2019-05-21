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
          <h1 class="display-4 text-center">List of stage directors</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
  <div class="container">
      <div class="row">
        <div class="col-md-12 text-center"><a class="btn btn-secondary" href="directors.php">Show all directors</a> <a class="btn btn-secondary" href="directors.php?samecountry=true">Match directors with the same country</a></div>
      </div>
  </div>
  </div> 
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered ">
              
                
                <?php
                require('connection.php');
                  
                if(isset($_GET["samecountry"])) {
                if($_GET["samecountry"] == true) { //SELF JOIN - Display stage directors with the same country
                    echo '<thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Selected director</th>
                  <th>Matched director</th>
                  <th>Country</th>
                </tr>
              </thead>
              <tbody>';
                    $sql = "
                    SELECT A.directorID, B.directorID, A.firstname AS dfirstname1, B.firstname AS dfirstname2, A.lastname AS dlastname1, B.lastname AS dlastname2, A.country 
                    FROM stagedirector A, stagedirector B
                    WHERE A.directorID <> B.directorID
                    AND A.country = B.country
                    ORDER BY A.country;
                    
                    ";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                    $i=0; //Record ID variable
                    while($row = $result->fetch_assoc()) {
                        $i++;
                        echo '<tr> <td>' .$i. ' </td><td> ' . $row["dfirstname1"]. ' ' .$row["dlastname1"]. '</td><td> ' . $row["dfirstname2"]. ' ' .$row["dlastname2"]. '</td><td>' .$row["country"]. '</td></tr>';
                        
                    }
                } else {
                    echo "no results";
                }
                    
                }
                }
                else {
                echo '<thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Country</th>
                  <th>Movies</th>
                </tr>
              </thead>
              <tbody>';
                $sql = "SELECT directorID, firstname, lastname, country, moviesCount FROM stagedirector";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<tr> <td>' . $row["directorID"]. ' </td><td> ' . $row["firstname"]. '</td><td> ' . $row["lastname"]. '</td><td>' .$row["country"]. '</td><td class="text-center">' .$row["moviesCount"].'      <a class="btn btn-outline-dark" href="movies.php?director=' .$row["directorID"] .'">Check available</a></td></tr>';
                    }
                } else {
                    echo "no results";
                }
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