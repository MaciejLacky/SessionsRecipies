<?php
require_once 'db_connector.php';



$itemToDelete = $_GET["id"];

$sql_statment = "DELETE FROM `comments_table` WHERE `comments_table`.`id` = '$itemToDelete' ";
if ($connection){

    $result = mysqli_query($connection, $sql_statment);
    if($result){
        echo "deleted item with id = " . "$itemToDelete" . "<br>";
    }
    else{
        echo "Error with the sql" . mysqli_error($connection);
    }

}
else{
    echo "Error connecting" . mysqli_connect_error();
}
?>