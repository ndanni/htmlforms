<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$phone_number = $_POST['phone_number'];
$gender = $_POST['gender'];
$country = $_POST['country'];
saveToFile ($firstname, $lastname, $email,
 $password,$confirm_password, $phone_number, $gender, $country );
saveToDatabase ($firstname, $lastname, $email,
$password,$confirm_password, $phone_number, $gender, $country);
header('Location:success.html');
function saveToFile ($firstname, $lastname, $email,
$password,$confirm_password, $phone_number, $gender, $country) {
$fileHandler = fopen ('record.txt', 'a');
$string = $firstname . ',' . $lastname . ',' . $email . ',' . $password . 
',' . $confirm_password . ',' . $phone_number . ',' . $gender . ',' . $country . "\n";
fwrite ($fileHandler, $string);
fclose ($fileHandler);
}
function saveToDatabase($firstname, $lastname, $email,
$password,$confirm_password, $phone_number, $gender, $country) {
    $serverName = "localhost";
    $database = "registration";
    $username = "root";
    $password = "";
    //Open database connection
    $conn = mysqli_connect($serverName, $username, $password, $database);
    // Check that connection exists
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO users (firstname, lastname, email,
    password,confirm_password, phone_number, gender,country, created_date)
    VALUES ('$firstname', '$lastname', '$email',
'$password','$confirm_password', '$phone_number', '$gender','$country', NOW())";
    $result = mysqli_query($conn, $sql);
    //Check for errors
    if (!$result) {
    die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
    //Close the connection
    mysqli_close($conn);
    }
?>

