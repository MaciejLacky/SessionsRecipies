
<?php

$id = $_GET["id"];
require_once "showTopMenu.php";
require_once "db_connector.php";

if($connection)
{
    $sql_statment = "SELECT * FROM `recipes_table` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $sql_statment);
    if($result){
       while($row = mysqli_fetch_assoc($result)){
           $recipe_name = $row["recipe_title"];
           $recipe_ingredients = $row["recipe_ingrediens"];
           $recipe_instructions = $row["recipe_intructions"];
           
         
       }
    }
    else{
        echo "Error with the sql" . mysqli_error($connection);
    }
}
else{
    echo "error connection" . mysqli_connect_error();
}

?>

<div class="form-container">
<h2>Add a recipe</h2>
<p>Fill out all of the fields and submit</p>
<form action="processEditItem.php">
    <input type ="hidden" name ="id" value="<?php echo $id ?>"></input>
    Recipe Title:<input type="text" name="recipeTitle" value="<?php echo $recipe_name; ?>"></input><br>
    Recipe Ingredients:<textarea rows="5" cols="50" name="recipeIngredients"><?php echo $recipe_ingredients; ?></textarea><br>
    Recipe Instructions:<textarea rows="5" cols="50" name="recipeInstructions"><?php echo $recipe_instructions; ?></textarea><br>
    <button type="submit">Save</button>
</form>
</div>