<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="log.css" />

</head>
<title>Read</title>

<body>
    <H1>
        User Table
</H1><button class="mybtn" name="C" type="submit"> <a class="links" href="create.php">Create Row</a></button><br>
    <?php
    include('conn.php');
    $sql = "SELECT * FROM user";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Mobile no</th>
                        <th>Age</th>
                        <th style="text-align: center;">Update</th>
                        <th style="text-align: center;">Delete</th>
                    </tr>
                </thead>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['mob']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td style="text-align: center;">
                            <a href="update.php?edit=<?php echo $row['email'];?>" class="edit_btn">Edit</a>
                        </td>
                        <td style="text-align: center;">
                            <a href="delete.php?del=<?php echo $row['email']; ?>" class="del_btn">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
    <?php
            mysqli_free_result($result);
        } else {
            echo "No records in the Table.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    mysqli_close($conn);

    ?>
</body>

</html>