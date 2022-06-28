<?php
include "connection.php";
?>
<?php
    $id = $_GET['id'];

    $read = "SELECT * FROM insert_data WHERE id=$id";
    $result = mysqli_query($conn, $read);
    $row = mysqli_fetch_array($result);

    if(isset($_POST['edit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dept = $_POST['dept'];

        $str = "UPDATE insert_data SET name='$name', email='$email', phone='$phone', dept='$dept' WHERE id=$id";

        $query = mysqli_query($conn, $str);

        if($query){
            echo  "<script>alert('Data edited successfully')</script>";
            header("Location: insert.php");
        }else{
            echo "<script>alert('Data edit failed')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Page</title>
</head>
<body>
    <h1>Edit Data</h1>
    <div class="container">
        <form method="POST">
                <input type="text" value="<?php echo $row['name']; ?>" name="name" placeholder="name"> <br> <br>
                <input type="email" value="<?php echo $row['email']; ?>" name="email" placeholder="email"> <br> <br>
                <input type="text" value="<?php echo $row['phone']; ?>" name="phone" placeholder="phone"> <br> <br>
                <select name="dept">
                    <option><?php echo $row['dept'] ?></option>
                    <option>CSE</option>
                    <option>EEE</option>
                    <option>BBA</option>
                </select>
                <br><br>
                <button name="edit">Edit</button>
        </form>
    </div>
</body>
</html>