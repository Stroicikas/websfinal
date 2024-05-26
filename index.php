<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <form action = "contactform.php" method="POST" enctype="multipart/form-data">
        <label for="fullName">Full Name</label>
        <input type="text" name="fullName">
        <label for="accountNumber">Account Number</label>
        <input type="text" name="accountNumber">
        <label for="moneyAmount">Money Amount</label>
        <input type="text" name="moneyAmount">
        <label for="image">Image</label>
        <input type="file" name="image">
        <input type="submit" value="submit" name="submit">
    </form>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $newDB = "user_bank";

    $conn = mysqli_connect($servername, $username, $password, $newDB);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else {
        echo("Connected Successfully<br>");
    }

if (isset($_POST['submit'])) {
    $name = $_POST['fullName'];
    $accNumb = $_POST['accountNumber'];
    (float) $moners = $_POST['moneyAmount'];
    
    $target_dir = "upload/";
    $targer_file = $target_dir . $_FILES["image"] ["name"];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targer_file,PATHINFO_EXTENSION));
    
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"] ["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }
        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)) {
        echo "File already exists.";
        $uploadOk = 0;
    }
    if ($_FILES["image"]["size"] > 500000000) {
        echo "File is too big.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imagineFileType != "jpeg" && $imagineFileType != "gif") {
        echo "Unaviable file type, only [JPG JPEG PNG and GIF] files are allowed";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Your file was not uploaded";
    }
    else {
        if (move_uploaded_file($_FILES["image"] ["tmp_name"], $targer_file)) {
            echo "File" . htmlspecialchars(basename($_FILES["image"] ["name"])). "has been uploaded";
        }
        else {
            echo "Error, could not upload file";
        }
    }
}
    ?>
</body>
</html>