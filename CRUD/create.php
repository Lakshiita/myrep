<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="log.css" />
</head>

<body>
    <div id="myForm">
        <form method="post">
            <h3>Create Entry</h3>
            <input class="myinp" type="email" placeholder="Email" name="email" required>
            <br><br>
            <input class="myinp" type="text"  pattern="[0-9]{10}" placeholder="Mobile No." name="mobile" id="mob" required>
            <br><br>
            <input class="myinp" type="number" placeholder="Age" name="age" id="age" required min="1" max="100">
            <br><br>
            <button type="submit" class="btn">Insert</button>
        </form>
    </div><br><br><br><br>
    <button class="mybtn" name="R" type="submit"><a class="links" href="read.php">Read Data</a></button><br><br>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('conn.php');

        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $age = $_POST['age'];
        // echo $email ;echo $mobile;echo $age ;


        $sql = "INSERT INTO `user` (`email`, `mob`, `age`) VALUES ('$email', '$mobile', '$age')";
?>

<?php
        if (mysqli_query($conn, $sql)) {
            echo "Query Executed ! Row inserted";
        } else {
            echo "Error " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
</body>

</html>