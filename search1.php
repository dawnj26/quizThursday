<?php
if (empty($_GET['search']) || empty($_GET['condition'])) {
    die();
}

$search = $_GET['search'];
$condition = $_GET['condition'];

$q = "SELECT book_author.ISBN, book.title ,author.name FROM `book_author` INNER JOIN author ON book_author.authorID = author.AuthorID INNER JOIN book ON book_author.ISBN = book.ISBN WHERE $condition LIKE '%$search%'";

require "config.php";

$result = $conn->query($q);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>ISBN: " . $row['ISBN'] . "</p>";
        echo "<p>Title: " . $row['title'] . "</p>";
        echo "<p>Author name: " . $row['name'] . "</p>";
    }
}