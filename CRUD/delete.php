<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="log.css" />

</head>
<title>Delete</title>

<body>
    <button class="mybtn" name="R" type="submit"><a class="links" href="read.php">Read Data</a></button>
    <?php
        include('conn.php');
        $email = $_GET['del'];
        // echo $email ;echo $mobile;echo $age ;
        $sql = "DELETE from user WHERE email='$email'";
        if (mysqli_query($conn, $sql)) {
            echo "Query Executed ! Row Deleted";
        } else {
            echo "Error " . mysqli_error($conn);
        }   
        mysqli_close($conn);
    ?>
</body>

</html>