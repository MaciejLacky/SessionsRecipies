<?php
session_start();
require_once 'db_connector.php';

if($_SESSION["role"] != "admin"){
 echo "please login as a admin";
 exit;
}



$sql_statment = "SELECT * FROM `recipies_table` ";
if ($connection){

    $result = mysqli_query($connection, $sql_statment);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            echo "recipe id: " . $row["id"] . "<br>";
            echo "recipe title: " . $row["recipie_title"] . "<br>";
            echo "recipe ingredients: " . $row["recipie_ingredients"] . "<br>";
            echo "recipe instructions: " . $row["recipie_instructions"] . "<br>"; 

            ?>

                <form action = "processDeleteItem.php">
                <input type="hidden" name="id" value="<?php echo $row["id"] ?>"></input>
                <button type="submit" >delete</button>
                </form>

            <?php
            
            ?>

                <form action = "showEditForm.php">
                <input type="hidden" name="id" value="<?php echo $row["id"] ?>"></input>
                <button type="submit" >edit</button>
                </form>

            <?php
            echo "+++++++++++++" . "<br>" ;
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