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
          <h1 class="display-4 text-center">List of genres</h1>
        </div>
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
                  <th>Genre name</th>
                  <th>Description</th>
                  <th>Movies</th>
                </tr>
              </thead>
              <tbody>
                  
                <?php
                require('connection.php');
                  

                $sql = "SELECT genreID, genrename, genredescription FROM genre";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<tr> <td>' . $row["genreID"]. ' </td><td> ' . $row["genrename"]. '</td><td> ' . $row["genredescription"]. '</td><td class="text-center"><a class="btn btn-outline-dark" href="movies.php?genre=' .$row["genreID"] .'">Check</a></td></tr>';
                    }
                } else {
                    echo "no results";
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