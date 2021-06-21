<?php 
// the purpose of this module is to insert a new recipe into the recibies_table
// this module accepts input from the showAddForm.php page.  
// show a success message with a link to the index.php page


session_start();

require_once "db_connector.php";
$userName = $_GET["name"];
$userPassword = $_GET["password"];



// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
  
  $sql_statment = " INSERT INTO `users_table` (`id`, `user_name`, `users_password`, `role`) VALUES (NULL, '$userName', '$userPassword', 'user') ";
  
   if (mysqli_query($connection, $sql_statment)) {
      echo "New record created successfully";
      echo  "click <a href='index.php'>here</a> to login";
    } else {
      echo "Error: " . $sql_statment . "<br>" . mysqli_error($connection);
    }

?>