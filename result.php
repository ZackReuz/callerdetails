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
        $mobile = $_GET['mobile'];

        include './connection.php';



        // Query to select details of mobile number 
        $sql = "SELECT * FROM details WHERE mobile='$mobile'";
        $result = $conn->query($sql);
        ?>

        <table class="table mt-4">
            <thead class="thead-light ">
                <tr>

                    <th scope="col">Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Operator</th>
                </tr>
            </thead>
            <tbody>


                <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr> <td> " . $row["callerName"] . "</td><td>" . $row["location"] . " </td><td>" . $row["operator"] . "</td></tr>";
                    }
                }
                $conn->close();
                ?>







            </tbody>
        </table>


        <?php

        if ($result->num_rows == 0) {
            echo "<h3 class='text-center text-muted text-monospace'>Not Found</h3>";
            echo "<button class='d-block m-auto btn btn-primary mt-4' data-toggle='modal' data-target='#exampleModal'>Add</button>";
        }
        ?>
        <!-- <h3 class="text-muted text-monospace">Not Founded :(</h3>
        <button type="button" class="" data-toggle="modal" data-target="#exampleModal">
            Add
        </button> -->



        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="addNew.php" method="POST">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="">Mobile Number</label>
                                <input type="text" name="mobileNumber" value="<?php echo $mobile; ?>" class="form-control" id="">
                            </div>

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="callerName" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Location</label>
                                <input type="text" name="location" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Operator</label>
                                <input type="text" name="Operator" class="form-control" id="">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>