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
        <div class="col-md-12 text-center"><a class="btn btn-secondary" href="addorder.php">Add new order</a></div>
      </div>
    </div>
  </div>    
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-4 text-center">Orders</h1>
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
                  <th>Customer</th>
                  <th>Employee</th>
                  <th>Movie</th>
                  <th>Rented till</th>
                  <th>Price</th>
                  <th>Order Date</th>
                  <th>Receipt</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  require('../connection.php');
                  
             
            
                    
                  
                  
                  

                  $sql = "
                  SELECT orders.orderID, customer.firstname as cfirstname, customer.lastname as clastname, employee.firstname as efirstname, employee.lastname as elastname, movie.name, movie.rentedtill, orders.price, orders.orderdate 
                  FROM orders
                  INNER JOIN customer
                  ON orders.customerID = customer.customerID
                  INNER JOIN employee
                  ON orders.employeeID = employee.employeeID
                  INNER JOIN movie
                  ON orders.movieID = movie.movieID;";
                  $result = $conn->query($sql);
                

                  if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    
                    echo 
                        '<tr><td>' .$row["orderID"]. '</td><td>'
                        .$row["cfirstname"]. ' ' .$row["clastname"]. '</td><td>'
                        .$row["efirstname"]. ' ' .$row["elastname"]. '</td><td>'
                        .$row["name"]. '</td><td>'
                        .$row["rentedtill"]. '</td><td>£ '
                        .$row["price"]. '</td><td>'
                        .$row["orderdate"]. '</td><td><a class="btn btn-outline-dark" href="receipt.php?orderID='
                        .$row["orderID"]. '" target="_blank">Print</a></td></tr>';
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
        <div class="col-md-6 text-center"><a class="btn btn-secondary" href="index.php">&lt;&lt; Back</a></div>
        <div class="col-md-6 text-center"><a class="btn btn-primary" href="deletepastorders.php">Delete past orders</a></div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>