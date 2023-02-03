<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="log.css" />
</head>
<title>Update</title>
<body>
    <button class="mybtn" name="R" type="submit"><a class="links" href="read.php">View Updates</a></button>
    <h1>
        Selected Row
    </h1>
    <?php
    if (isset($_GET['edit'])) {
        include('conn.php');
        $email = $_GET['edit'];
        $update = true;
        $sql = "SELECT * FROM user WHERE email=\"$email\"";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Mobile no</th>
                            <th>Age</th>
                            <th>Save</th>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <form method="post">
                                <td><?php echo $row['email']; ?></td>
                                <td><input type="text" placeholder="Mobile No." name="mobile" value="<?php echo $row['mob']; ?>" id="mob" require></td>
                                <td><input type="text" placeholder="Age." name="age" id="mob" value="<?php echo $row['age']; ?>" require></td>
                                <td><button class="mybtn" type="submit">Save</button></td>
                            </form>
                        </tr>
                    <?php } ?>
                </table>
    <?php }
            mysqli_free_result($result);
        } else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "ERROR: Could not able to execute " . mysqli_error($conn);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_GET['edit'];
        $mobile = $_POST['mobile'];
        $age = $_POST['age'];
        $sql = "UPDATE user SET mob='$mobile', age='$age' WHERE email='$email'";

        if (mysqli_query($conn, $sql)) {
            echo "Query Executed ! Row Updated";
        } else {
            echo "Error " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    ?>
</body>
</html>