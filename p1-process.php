<?php
require_once('db.php');

function check_empty($data){
    return trim($data);
}

$result = true;
$action = $_POST['action'] ?? 'insert';

if ($action == 'insert' || $action == 'update') {
    $name = $_POST['name'];
    if (!check_empty($name)) {
        echo 'Name is required!';
        $result = false;
    }

    $phone_number = $_POST['phone_number'];
    if (!check_empty($phone_number)) {
        echo 'Phone number is required!';
        $result = false;
    }

    $email_address = $_POST['email_address'];
    if (!check_empty($email_address)) {
        echo 'Email is required!';
        $result = false;
    }

    $fb_profile = $_POST['fb_profile'];
    if (!check_empty($fb_profile)) {
        echo 'Fb Profile is required!';
        $result = false;
    }

    $message = $_POST['message'];
    $password = $_POST['password'];
    if (!check_empty($password)) {
        echo 'Password is required!';
        $result = false;
    }
}

if ($result) {
    if ($action == 'insert') {
        $sql = "INSERT INTO form (name, phone_number, email, fb_profile, message, password)
                VALUES ('$name', '$phone_number', '$email_address', '$fb_profile', '$message', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($action == 'update') {
        $id = $_POST['id'];
        $sql = "UPDATE form SET 
                    name='$name', 
                    phone_number='$phone_number', 
                    email='$email_address', 
                    fb_profile='$fb_profile', 
                    message='$message', 
                    password='$password' 
                WHERE id='$id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } elseif ($action == 'delete') {
        $id = $_POST['id'];
        $sql = "DELETE FROM form WHERE id='$id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    $conn->close();
    header("Location: index.php");
    exit;
} else {
    echo "There was an error in the form data.";
}
?>
