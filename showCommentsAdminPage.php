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
            echo "<div class = 'usercontainer'>";
            echo "recipe id: " . $row["id"] . "<br>";
            $user_id = $row["id"];
            echo "user name: " . $row["user_name"] . "<br>";
            echo "user password: " . $row["users_password"] . "<br>";
            echo "<hr>" . "<br>" ;

            $sql_statment2 = "SELECT * FROM comments_table JOIN users_table ON users_table.id = comments_table.users_table_id WHERE users_table.id = $user_id";
            $result2 = mysqli_query($connection, $sql_statment2);
            if($result2){
                echo "<div class='commentscontainer'>";
                while($row2 = mysqli_fetch_assoc($result2)){
                    echo "comment id: " . $row2["id"] . "<br>";
                    echo "text: " . $row2["comment_text"] . "<br>";
                    ?>
                    <form action="showEditCommentForm.php">
                    <input type="hidden" name="id" value="<?php echo['comment_id']?>">
                    <button type="submit">EDIT</button>
                    </form>
                    <form action="processDeleteComment.php">
                    <input type="hidden" name="id" value="<?php echo['comment_id']?>">
                    <button type="submit">DELETE</button>
                    </form>
                    <?php
                    echo "<hr>" . "<br>" ;
                }
                echo "</div>" ;
            }
            echo "</div>";
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