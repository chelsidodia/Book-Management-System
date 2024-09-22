<?php

require 'Book.php';

$books = []; 
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $publication_year = $_POST['publication_year'];

    try {
        $book = new Book($title, $author, $publication_year);
        $books[] = $book; 
        $success = "Success Message!!";
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

function displayBooks($books) {
    if (empty($books)) {
        echo "<p>No data found. Please add books to view data.</p>";
    } else {
        echo "<table width='100%' border='1' cell-padding='5%' cell-spacing='5%'>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Year</th>
                </tr>";
        foreach ($books as $book) {
            echo "<tr>
                    <td>" . $book->getTitle() . "</td>
                    <td>" . $book->getAuthor() . "</td>
                    <td>" . $book->getPublicationYear() . "</td>
                  </tr>";
        }
        echo "</table>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Management System</title>
    <style>
        body{
            background-color:#e7dcfc;
            text-align: center;
        }
        hr{
            width: 90%;
        }
        h1{
            text-shadow: 5px 2px 2px white;
        }
        a{
            text-decoration: none;
            color:black;
            font-weight: bold;
        }
        button{
            background-color: black;
            color:white;
            font-weight: bold;
            border: 1px solid black;
            padding: 1%;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body onload="showBooks()">
    <h1>Book Management System</h1>
    <hr>

    <div class="menu-bar">
        <table width="100%">
            <tr>
                <td><a href="javascript:void(0);" onclick="addBooks()">Add Books</a></td>
                <td><a href="javascript:void(0);" onclick="showBooks()">View Books</a></td>
            </tr>
        </table>
    </div>
    <hr>

    <div id="book-insert">
        <?php


        if (!empty($error)) {
            echo "<p style='color:red;'>Error: $error</p>";
        }
        if (!empty($success)) {
            echo "<p style='color:green;'>$success</p>";
        }
        ?>

        <form method="post" action="">
            <br><br>
            <table width="100%">
                <tr>
                    <td>
                        <label for="title">Book Title:</label>
                    </td>
                    <td>
                        <input type="text" id="title" name="title" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="author">Author:</label>
                    </td>
                    <td>
                        <input type="text" id="author" name="author" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="publication_year">Publication year:</label>
                    </td>
                    <td>
                        <input type="number" id="publication_year" name="publication_year" required>
                    </td>
                </tr>
            </table>
            <br><br>
            <button type="submit">Add Book</button>
        </form>
    </div>

    <div id="book-display">
        <h2>Books</h2>
        <?php displayBooks($books); ?>
    </div>

    <script>
        function showBooks()
        {
            document.getElementById("book-insert").style.display = "none";
            document.getElementById("book-display").style.display = "block";
        }

        function addBooks()
        {
            document.getElementById("book-insert").style.display = "block";
            document.getElementById("book-display").style.display = "none";
        }
    </script>
</body>
</html>