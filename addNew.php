<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Caller Details</title>
</head>

<body>
    <div class="container ">
        <?php
        include './connection.php';

        $mobile = $_POST['mobileNumber'];
        $caller = $_POST['callerName'];
        $location = $_POST['location'];
        $operator = $_POST['Operator'];

        $sql = "INSERT INTO details values ('$mobile','$caller','$location','$operator');";
        
        if ($conn->query($sql) === TRUE) {
            echo "<h3>Details added successfully</h3>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          
          $conn->close();
        ?>
        <a class="btn btn-link" href="./index.php">Go to Home</a>

    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>