<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $sql = "SELECT * FROM form WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Update Record</title>
    </head>
    <body>
        <h2>Update Record</h2>
        <form action="p1-process.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="action" value='update'>
            Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
            Phone: <input type="text" name="phone_number" value="<?php echo $row['phone_number']; ?>"><br>
            Email: <input type="text" name="email_address" value="<?php echo $row['email']; ?>"><br>
            Fb Profile: <input type="text" name="fb_profile" value="<?php echo $row['fb_profile']; ?>"><br>
            Message: <input type="text" name="message" value="<?php echo $row['message']; ?>"><br>
            Password: <input type="text" name="password" value="<?php echo $row['password']; ?>"><br>
            <input type="submit" value="update">
        </form>
    </body>
    </html>
    <?php
}

$conn->close();
?>