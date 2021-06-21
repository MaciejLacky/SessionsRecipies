<?php
require_once 'db_connector.php';

$searchTitle = $_GET["recipeName"];
$searchIngredients = $_GET["recipeIngredients"];
$searchInstruction = $_GET["recipeInstructions"];
?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="custom-styles.css">
        <head>
    <html>
<?php


$sql_statment = "SELECT recipies_table.*, users_table.id AS user_id, users_table.user_name FROM `recipies_table`  JOIN `users_table` ON users_table.id =  recipies_table.users_table_id WHERE `recipie_title` LIKE '%$searchTitle%' 
 ";
if ($connection){

    $result = mysqli_query($connection, $sql_statment);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='recipe-container'>";
            echo "recipe id: " . $row["id"] . "<br>";
            echo "<h2> " . $row["recipie_title"] . " by ". $row["user_name"]. "</h2>";
            echo "recipe ingredients: " . $row["recipie_ingredients"] . "<br>";
            echo "recipe instructions: " . $row["recipie_instructions"] . "<br>"; 
            echo "<h3>comments</h3>"."<br/>";
            $recipe_id = $row["id"];
            $sql_statment_comments = "SELECT * FROM `comments_table` JOIN `users_table` ON comments_table.users_table_id = users_table.id WHERE `recipies_table_id` = '$recipe_id'" ;
            $result_comments = mysqli_query($connection, $sql_statment_comments);
            if($result_comments){
                while($row_comments = mysqli_fetch_array($result_comments)){
                    echo $row_comments["comment_text"]. " - ";
                    echo  $row_comments["user_name"]. "<br>";
                    }
                }

            ?>
            <form action ="processComments.php">
                <input type="hidden" name="id" value="<?php echo $row["id"] ?>"></input>
            Comments: <textarea name ="comments" cols="50" row="5"></textarea><br/>
            <button type="submit"> add comment</button>
            </form>
            </div>
            <?php
        }
    }
    else{
        echo "Error with the sql" . mysqli_error($connection);
    }

}
else{
    echo "Error connecting" . mysqli_connect_error();
}
?>