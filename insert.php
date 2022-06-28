<?php
include "connection.php";
?>

<?php   
    //Insert
    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dept = $_POST['dept'];

        $str = "INSERT INTO insert_data(name,email,phone,dept)
        VALUES ('$name', '$email', '$phone', '$dept')";
        $result = mysqli_query($conn, $str);

        if($result){
            echo "<script>alert('Data sent successfully')</script>";
        }else{
            echo "<script>alert('Data couldn't be sent')</script>";
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
    <title>Insert</title>
</head>
<body>
    <h1>INSERT DATA</h1>
    <div class="container">
        <form method="POST">
            <input type="text" name="name" placeholder="name"> <br> <br>
            <input type="email" name="email" placeholder="email"> <br> <br>
            <input type="text" name="phone" placeholder="phone"> <br> <br>
            <select name="dept">
                <option>CSE</option>
                <option>EEE</option>
                <option>BBA</option>
            </select>
            <br><br>
            <button name="send">Send</button>
        </form>
        <br><br><br>

        <h1>Read Data</h1>
        <table>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Edit</th>
            <th>Delete</th>
        <?php
            //Read
            $str="SELECT * FROM insert_data";
            $result = mysqli_query($conn, $str);
            while($row = mysqli_fetch_array($result)){ ?>
               <tr>
               <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['dept'] ?></td>
                <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                <td><a onclick="return confirm('Are you sure you want to delete?')" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
               </tr>

            <?php
            }
        ?>
        </table>
        <br><br><br>
    </div>
    <br><br><br>
</body>
</html>