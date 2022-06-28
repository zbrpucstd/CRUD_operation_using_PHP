<?php
include "connection.php";
?>
<?php
    //delete
    $id = $_GET['id'];

    $str = "DELETE FROM insert_data WHERE id=$id";
    mysqli_query($conn, $str);

    header("Location: insert.php");
?>