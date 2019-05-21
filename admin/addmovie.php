<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css">
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
          <h1 class="display-4 text-center">Add new movie</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form id="addmovie" name="addmovie" action="addmovieproceed.php" method="post">
            <h6 class="">Movie name</h6>
            <div class="form-group"> <input type="text" class="form-control form-control-lg" placeholder="Enter movie name" id="moviename" name="moviename" required="required"> </div>
            <h6 class="">Date of production</h6>
            <div class="form-group"> <input type="date" class="form-control form-control-lg" id="moviedate" name="moviedate" required="required"> </div>
            <h6 class="">Genre</h6>
            <div class="form-group">
              <select name="moviegenre" required="required" class="form-control-lg">
                <option value="0">Action</option>
                <option value="1">Adventure</option>
                <option value="2">Comedy</option>
                <option value="3">Crime</option>
                <option value="4">Drama</option>
                <option value="5">Historical</option>
                <option value="6">Horror</option>
                <option value="7">Sciencie Fiction</option>
                <option value="8">Western</option>
                <option value=NULL>Movie genre not listed above</option>
              </select> </div>
            <h6 class="">Stage Director</h6>
              <div class="form-group"> <select name="moviedirector" required="required" class="form-control-lg">
            <?php
            require('../connection.php');
            
            $sql = 'SELECT directorID, firstname, lastname FROM stagedirector;';
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '
                <option value="'.$row["directorID"].'">'.$row["firstname"].' '.$row["lastname"].'</option>';
                    }}
            
            
            ?>
            </select> </div>
            <h6 class="">Price per day</h6>
            <div class="form-group"> <input type="number" class="form-control form-control-lg" placeholder="Enter rental cost per day" id="movieprice" name="movieprice" required="required"> </div>
            <h6 class="">Youtube trailer ID</h6>
            <div class="form-group"> <input type="text" class="form-control form-control-lg" placeholder="Enter youtube video ID" id="ytID" name="ytID" required="required"> </div>
            <h6 class="">Description</h6>
            <textarea id="moviedescription" name="moviedescription" rows="5" cols="40" class="" style="	min-width: 100%;" required="required"></textarea>
            <button type="submit" class="btn btn-primary">+&nbsp;Add movie</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center"><a class="btn btn-secondary" href="movies.php">&lt;&lt; Back</a></div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>

</html>