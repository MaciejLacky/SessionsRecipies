
<?php

$id = $_GET["id"];
require_once "showTopMenu.php";
require_once "db_connector.php";

if($connection)
{
    $sql_statment = "SELECT * FROM `comments_table` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $sql_statment);
    if($result){
       while($row = mysqli_fetch_assoc($result)){
           $comment_text = $row["comment_text"];
           $recipe_id = $row["recipies_table_id"];
           $user_id = $row["users_table_id"];
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
<h2>Edit comment number: <?php echo $id; ?> </h2>
<p>Fill out all of the fields and submit</p>
<form action="processEditComment.php">
    <input type ="hidden" name ="id" value="<?php echo $id ?>"></input>
    text:<input type="text" name="comment" value="<?php echo $comment_text; ?>"></input><br>
    recipe id:<input type="text" name="recipeid" value= "<?php echo $recipe_id; ?>"></input><br>
    user id:<input type="text" name="userid" value= "<?php echo $user_id; ?>"></input><br>
    <button type="submit">Save</button>
</form>
</div>