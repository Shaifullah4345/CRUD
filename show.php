<table border="1">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Fb Profile</th>
        <th>Message</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>
    <?php
    // Connect to the database
    include 'db.php';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the database
    $sql = "SELECT * FROM form";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['fb_profile'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>";
            echo "<form action='update.php' method='post' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<input type='submit' value='Update'>";
            echo "</form>";
            echo "<form action='p1-process.php' method='post' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<input type='hidden' name='action' value='delete'>";
            echo "<input type='submit' value='Delete'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
?>
</table>
