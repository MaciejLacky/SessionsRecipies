<?php 
// the purpose of this module is to insert a new recipe into the recibies_table
// this module accepts input from the showAddForm.php page.  
// show a success message with a link to the index.php page


session_start();

require_once "db_connector.php";
$recipeTitle = $_GET["recipeTitle"];
$recipeIngredients = $_GET["recipeIngredients"];
$recipeInstructions = $_GET["recipeInstructions"];
$id = $_GET["id"];
$user_Id = $_SESSION["userid"];
$role = $_SESSION["role"];


// Check connection
if (!$connection && isset($_SESSION['userid']) && $role = "admin") {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
  
  $sql_statment = " UPDATE `recipes_table` SET `recipe_title` = '$recipeTitle', `recipe_ingrediens` = '$recipeIngredients', `recipe_intructions`= '$recipeInstructions' WHERE `id` = '$id'";
  
   if (mysqli_query($connection, $sql_statment)) {
      echo "Update successfully";
      echo  "click <a href='index.php'>here</a> to return";
    } else {
      echo "Error: " . $sql_statment . "<br>" . mysqli_error($connection);
    }

?>