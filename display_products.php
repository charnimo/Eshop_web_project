<?php
include 'connection.php'; 


$sql = "SELECT * FROM produits";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {

    //ne9sa zina
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<p>Price: $" . $row['price'] . "</p>";
        echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "'>";
        echo "</div>";
    }
} else {
    echo "No products found";
}

mysqli_close($conn);
?>
