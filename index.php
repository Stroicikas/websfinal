<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Bank</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            Bank Data
        </a>
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="used_data.php">Data Upload</a>
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
    <table class="table table-hover table-dark">
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Full </th>
            <th scope="col">Account Number</th>
            <th scope="col">Money</th>
            </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM user_info";
    $result = mysqli_query($conn, $sql);
    if ($result-> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
            <td scope='col'><img src='" . $row["IMG"] . "' width='40em' height='40em' class='rounded-circle'></td>
            <td scope='col'>" . $row["userName"]. "</td>
            <td scope='col'>" . $row["bankAccount"]. "</td>
            <td scope='col'>" . $row["saldo"]. "$</td>
            </tr>"
            ;
        }
    } 
    ?>
    </tbody>
    </table>
</body>
</html>