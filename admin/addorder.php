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
          <h1 class="display-4 text-center">Add new order</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form id="addorder" name="addorder" action="addorderproceed.php" method="post">
            <h6 class="">Customer</h6>
            <div class="form-group">
              <select name="customerorder" required="required" class="form-control-lg">
                <option disabled>- customer with no current movie -</option>
                <?php
                require('../connection.php');
                  
                $sql = '
                SELECT customerID, firstname, lastname, rentedtill
                FROM customer
                WHERE rentedtill < NOW() OR rentedtill IS NULL';        //Fill select options with data from table customer
                $result = $conn->query($sql);
                  
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row["customerID"].'">'.$row["firstname"].' '.$row["lastname"].'</option>';
                    }
                }
                else echo '0 results';
                ?>
              </select></div>
            <h6 class="">Employee</h6>
            <div class="form-group">
              <select name="employeeorder" required="required" class="form-control-lg">
                <option disabled>- logged employee -</option>
                <?php
                
                echo '<option value="'.$_SESSION["logged"].'" selected>'.$_SESSION["employee"].'</option>';
                    
                ?>
              </select></div>
            <h6 class="">Movie</h6>
            <div class="form-group">
              <select name="movieorder" required="required" class="form-control-lg">
                <option disabled>- available movies -</option>
                 <?php
                require('../connection.php');
                  
                $sql = 'SELECT * from movie WHERE rentedtill < NOW() OR rentedtill IS NULL';
                $result = $conn->query($sql);
                  
                  
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                echo '<option value="'.$row["movieID"].'">'.$row["name"].'</option>';
                    }
                }
                else echo '0 results';
                ?>
              </select></div>
            <h6 class="">Rent duration</h6>
            <div class="form-group">
              <select name="rentduration" required="required" class="form-control-lg">
                <option value=1>1 day</option>
                <option value=2>2 days</option>
                <option value=3>3 days</option>
                <option value=4>4 days</option>
                <option value=5>5 days</option>
                <option value=6>6 days</option>
                <option value=7>7 days</option>
                <option value=8>8 days</option>
                <option value=9>9 days</option>
                <option value=10>10 days</option>
                <option value=11>11 days</option>
                <option value=12>12 days</option>
                <option value=13>13 days</option>
                <option value=14>14 days</option>
                <option value=15>15 days</option>
                <option value=1>16 day</option>
                <option value=2>17 days</option>
                <option value=3>18 days</option>
                <option value=4>19 days</option>
                <option value=5>20 days</option>
                <option value=6>21 days</option>
                <option value=7>22 days</option>
                <option value=8>23 days</option>
                <option value=9>24 days</option>
                <option value=10>25 days</option>
                <option value=11>26 days</option>
                <option value=12>27 days</option>
                <option value=13>28 days</option>
                <option value=14>29 days</option>
                <option value=15>30 days</option>
              </select></div>
            <button type="submit" class="btn btn-primary">+&nbsp;Add order</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center"><a class="btn btn-secondary" href="orders.php">&lt;&lt; Back</a></div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>