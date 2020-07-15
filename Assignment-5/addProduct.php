<?php
    include './dbCred.php';

    $id = $_POST["product-id"];
    $name = $_POST["product-name"];
    $price = $_POST["product-price"];
    $description = $_POST["product-description"];

    echo $id."<br>";
    echo $description;

    $conn = mysqli_connect($servername, $username, $password,);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (mysqli_select_db($conn, "assignment5")) {
       mysqli_close($conn);
    } else {
        $query = "CREATE DATABASE assignment5";
        mysqli_query($conn, $query);
        if (mysqli_query($conn, $query)) {
        echo "Database created succesfully<br />";

        } else {
        echo "Error creating database: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "create table product(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        prod_id VARCHAR(30) NOT NULL,
        prod_name VARCHAR(100) NOT NULL,
        prod_price VARCHAR(100) NOT NULL,
        prod_desc VARCHAR(200)
    )";
    $conn->query($query);

    $query = "insert into product (prod_id, prod_name, prod_price, prod_desc) 
    VALUES('$id', '$name', '$price', '$description')";
    $conn->query($query);

    $result  = $conn->query("select * from product");

    echo "<table>";
    echo "<tr><th>ID</th><th>PRODUCT ID</th><th>PRODUCT NAME</th><th>PRODUCT DIS</th></tr>";
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