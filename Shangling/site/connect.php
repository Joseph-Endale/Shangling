<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$phone = $_POST['phone'];

// Datbase connection
$conn = new mysqli('localhost', 'root', '', 'data');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into tb_contact(name, email, message, phone,) values(?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $name, $email, $message, $phone,);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
