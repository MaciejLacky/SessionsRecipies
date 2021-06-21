
<?php

$id = $_GET["id"];
require_once "showTopMenu.php";
require_once "db_connector.php";

if($connection)
{
    $sql_statment = "SELECT * FROM `users_table` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $sql_statment);
    if($result){
       while($row = mysqli_fetch_assoc($result)){
           $user_name = $row["user_name"];
           $user_password = $row["users_password"];
           $role = $row["role"];
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
<h2>Edit user</h2>
<p>Fill out all of the fields and submit</p>
<form action="processEditUser.php">
    <input type ="hidden" name ="id" value="<?php echo $id ?>"></input>
    User name:<input type="text" name="userName" value="<?php echo $user_name; ?>"></input><br>
    User password:<input type="text" name="userPassword" value= "<?php echo $user_password; ?>"></input><br>
    Role:<input type="text" name="role" value= "<?php echo $role; ?>"></input><br>
    <button type="submit">Save</button>
</form>
</div>