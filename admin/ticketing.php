<!DOCTYPE html>
<html>

<head>
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
</head>

<body>

<style>
    #location{
        width:280px;
        margin-bottom:13px;
    }
    label{
        margin:0;
    }
</style>


    <?php
    session_start();
    include('includes/header.php');
    include('../functions/myfunctions.php');
    // include('report.php');

    ?>




    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-7">

            <?php
            if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['message']);
            }
            ?>

                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Ticketing</h3>
                    </div>
                    

                        <div class="card-body">
                         <form action="./code.php" method="post" class="d-flex justify-content-between">
                         <input type="hidden" name="data_id" value="<?= $data['id']; ?>">
                            <div class="left d-flex flex-column">
                                <label for="location">Department Location:</label>
                                  <select name="depart_location" id="location">
                                      <option value="New York" <?=  ['depart_location'] == 'New York' ? 'New York' : ''; ?>>New York</option>
                                      <option value="Los Angeles" <?= ['depart_location'] == 'Los Angeles' ? 'Los Angeles' : ''; ?>>Los Angeles</option>
                                      <option value="Chicago" <?= ['depart_location'] == 'Chicago' ? 'Chicago' : ''; ?>>Chicago</option>
                                      <option value="Houston" <?= ['depart_location'] == 'Houston' ? 'Houston' : ''; ?>>Houston</option>
                                      <option value="Miami" <?= ['depart_location'] == 'Miami' ? 'Miami' : ''; ?>>Miami</option>                                                
                                  </select>

                                <label for="destination">Destination:</label>
                                <select name="destination" id="destination">
                                      <option value="London" <?=  ['destination'] == 'London' ? 'London' : ''; ?>>London</option>
                                      <option value="Paris" <?= ['destination'] == 'Paris' ? 'Paris' : ''; ?>>Paris</option>
                                      <option value="Tokyo" <?= ['destination'] == 'Tokyo' ? 'Tokyo' : ''; ?>>Tokyo</option>
                                      <option value="Sydney" <?= ['destination'] == 'Sydney' ? 'Sydney' : ''; ?>>Sydney</option>
                                      <option value="Dubai" <?= ['destination'] == 'Dubai' ? 'Dubai' : ''; ?>>Dubai</option>                                                
                                  </select>
                                <div id="amount" class="mt-4">Total Amount:</div>
                                <button class="btn btn-success mt-4" name="save-ticket">Save</button>
                            </div>
                            <div class="right d-flex flex-column">
                                <label for="normal">Normal:</label>
                                <input type="number" id="normal" name="normal">
                                <label for="student">Student:</label>
                                <input type="number" id="student" name="student">
                                <label for="senior">Senior:</label>
                                <input type="number" id="senior" name="senior">
                                <button type="button" class="btn btn-primary mt-4" onclick="calculateAmount()">Total Amount</button>
                            </div>
                        </form>
                        
                    </div>       
                </div>
            </div>
        </div>
    </div>
    


    <script>
        function calculateAmount() {
  var location = document.getElementById("location").value;
  var destination = document.getElementById("destination").value;
  var normal = document.getElementById("normal").value;
  var student = document.getElementById("student").value;
  var senior = document.getElementById("senior").value;
   var amounts = {
    "New York-London": 100,
    "New York-Paris": 120,
    "New York-Tokyo": 150,
    "New York-Sydney": 180,
    "New York-Dubai": 200,
    "Los Angeles-London": 120,
    "Los Angeles-Paris": 140,
    "Los Angeles-Tokyo": 170,
    "Los Angeles-Sydney": 200,
    "Los Angeles-Dubai": 220,
    "Chicago-London": 110,
    "Chicago-Paris": 130,
    "Chicago-Tokyo": 160,
    "Chicago-Sydney": 190,
    "Chicago-Dubai": 210,
    "Houston-London": 90,
    "Houston-Paris": 110,
    "Houston-Tokyo": 140,
    "Houston-Sydney": 170,
    "Houston-Dubai": 190,
    "Miami-London": 80,
    "Miami-Paris": 100,
    "Miami-Tokyo": 130,
    "Miami-Sydney": 160,
    "Miami-Dubai": 180
  };
  
   var amount = amounts[location + "-" + destination];
  var total = normal * amount + student * amount * 0.8 + senior * amount * 0.6;
   document.getElementById("amount").textContent = "Total Amount: $" + total;
}
    </script>

</body>

</html>



<?php include('includes/footer.php'); ?>