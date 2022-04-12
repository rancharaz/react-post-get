<?php

header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Origin: *');
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // enter your own credentials
  
 $servername = "localhost";
 $username = "root";
 $pswd = "";
 $db = "ajaxform";

 /* database connection */
 $conn = new mysqli($servername, $username, $pswd, $db);


/*  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  $sname = test_input($_POST['fname']);
  $sphone = test_input($_POST['fphone']);
  $semail = test_input($_POST['fmail']);

  
 */

$sname = $conn->real_escape_string($_POST['fname']);
$sphone = $conn->real_escape_string($_POST['fphone']);
 $semail = $conn->real_escape_string($_POST['fmail']);

$sql = "INSERT INTO atest(fname, fphone, fmail)VALUES('$sname', '$sphone','$semail')";

if ($conn->query($sql) === TRUE) {
    echo "All the fields has been posted!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  /* connection close */
  $conn->close();
  
}