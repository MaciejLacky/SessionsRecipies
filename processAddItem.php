<?php 
// the purpose of this module is to insert a new recipe into the recibies_table
// this module accepts input from the showAddForm.php page.  
// show a success message with a link to the index.php page


session_start();

require_once "db_connector.php";
$recipeTitle = $_GET["recipeTitle"];
$recipeIngredients = $_GET["recipeIngredients"];
$recipeInstructions = $_GET["recipeInstructions"];
$user_Id = $_SESSION["userid"];


// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
  
  $sql_statment = " INSERT INTO `recipies_table` (`id`, `recipie_title`, `recipie_ingredients`, `recipie_instructions`, `users_table_id`) VALUES (NULL, '$recipeTitle', '$recipeIngredients', '$recipeInstructions', '$user_Id') ";
  
   if (mysqli_query($connection, $sql_statment)) {
      echo "New record created successfully";
      echo  "click <a href='index.php'>here</a> to return";
    } else {
      echo "Error: " . $sql_statment . "<br>" . mysqli_error($connection);
    }

?>