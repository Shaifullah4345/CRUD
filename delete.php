<?php
// Connect to the database
require_once('db.php');

// Get the id of the record to be deleted
$id = $_POST["id"];

// Delete the record
$sql = "DELETE FROM form WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

// Redirect back to the show page
header("Location: show.php");
exit;
?>