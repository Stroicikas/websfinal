<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>User Data</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        Data Upload
    </a>
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="index.php">Home</a>
        <a class="nav-item nav-link active" href="#">Data Upload <span class="sr-only">(current)</span></a>
    </div>
</nav>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $myDB = "user_bank";


    $conn = mysqli_connect($servername, $username, $password, $myDB);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        echo("Connected Successfully<br>");
    }
    ?>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fullName">Name</label>
            <input type="text" class="form-control" name="fullName" required>
        </div>
        <div class="form-group">
            <label for="accountNumber">Account Number</label>
            <input type="text" class="form-control" name="accountNumber" required>
        </div>
        <div class="form-group">
            <label for="moneyAmount">Money Available</label>
            <input type="text" class="form-control" name="moneyAmount" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <?php
        if(isset($_POST["submit"])) {
            $usrname = $_POST["fullName"];
            $accNum = $_POST["accountNumber"];
            $accMon = $_POST["moneyAmount"];
                $target_dir = "uploads/";
                $target_file = $target_dir . $_FILES["image"]["name"];
                $uploadOk = 1;
                if(file_exists($target_file)) {
                    $uploadOk = 0;
                }

                if($_FILES["image"]["size"] > 5000000) {
                    $uploadOk = 0;
                    echo "File is too big";  
                }
                if($uploadOk == 1) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                }
    
                if ($target_file !== "uploads/") {
                $sql = "INSERT INTO user_info (IMG, userName, bankAccount, saldo)
                VALUES ('$target_file', '$usrname', '$accNum', '$accMon')";
     
                mysqli_query($conn, $sql);
                }
                else {
                $sql = "INSERT INTO user_info (IMG, userName, bankAccount, saldo)
                VALUES ('uploads/default.png', '$usrname', '$accNum', '$accMon')";
    
                mysqli_query($conn, $sql);
                }
        }
        ?>
</body>
</html>