<?php

if (empty($_GET['search']) || empty($_GET['condition'])) {
    die();
}

$search = $_GET['search'];
$condition = $_GET['condition'];

$q = "SELECT $condition, book_author.transID, book.copies,publisher.name, publisher.location FROM `book_author` INNER JOIN book ON book_author.ISBN = book.ISBN INNER JOIN publisher ON book.PubNo = publisher.PubID WHERE $condition LIKE '%$search%'";

require "config.php";

$result = $conn->query($q);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['transID'] . "</td>";
        echo "<td>" . $row['copies'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "</tr>";
    }
}