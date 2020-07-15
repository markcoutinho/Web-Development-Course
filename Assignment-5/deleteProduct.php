<?php
    include './dbCred.php';

    $id = $_GET['id'];

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $conn->query("delete from product where id = " . $id);
    echo "<h1 style='color:red'>Product with id ".$id." deleted</h1>";
    $result  = $conn->query("select * from product");

    echo "<table>";
    echo "<tr><th>ID</th><th>PRODUCT ID</th><th>PRODUCT NAME</th><th>PRODUCT DISCRIPTION</th></tr>";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";

            $id = $row["prod_id"];
            $name = $row["prod_name"];
            $price = $row["prod_price"];
            $description = $row["prod_desc"];
            
            $description = strlen($description) > 20 ? substr($description, 0, 20)."..." : $description;

            echo "<th>".$row["id"]."</th>";
            echo "<td>".$id."</td><td>".$name."</td><td>".$price."</td><td>".$description."</td>";
            echo "</tr>";
        }
    }
    echo "</table>";

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Enter Product ID to be deleted</h1>
    <form method="GET" action="./deleteProduct.php">
        <input type="text" name="id">
        <input type="submit">
    </form> 
</body>
</html>