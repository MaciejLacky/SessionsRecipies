<?php 
// the purpose of this module is to insert a new recipe into the recibies_table
// this module accepts input from the showAddForm.php page.  
// show a success message with a link to the index.php page


session_start();

require_once "db_connector.php";
$comment = $_GET["comments"];
$id = $_GET["id"];
$user_Id = $_SESSION["userid"];


// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
  
  $sql_statment = " INSERT INTO `comments_table` (`id`, `comment_text`, `recipies_table_id`, `users_table_id`) VALUES (NULL, '$comment', '$id', '$user_Id') ";
  
   if (mysqli_query($connection, $sql_statment)) {
      echo "New record created successfully";
      echo  "click <a href='index.php'>here</a> to return";
    } else {
      echo "Error: " . $sql_statment . "<br>" . mysqli_error($connection);
    }

?>