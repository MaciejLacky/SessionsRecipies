<?php
session_start();
require_once 'db_connector.php';

if($_SESSION["role"] != "admin"){
 echo "please login as a admin";
 exit;
}



$sql_statment = "SELECT * FROM `users_table` ";
if ($connection){

    $result = mysqli_query($connection, $sql_statment);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            echo "recipe id: " . $row["id"] . "<br>";
            echo "user name: " . $row["user_name"] . "<br>";
            echo "user password: " . $row["users_password"] . "<br>";
           

            ?>

                <form action = "processDeleteUser.php">
                <input type="hidden" name="id" value="<?php echo $row["id"] ?>"></input>
                <button type="submit" >delete</button>
                </form>

            <?php
            
            ?>

                <form action = "showEditUserForm.php">
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