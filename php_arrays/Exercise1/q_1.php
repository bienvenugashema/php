
<?php 

if(isset($_POST['submit'])){
    $book = array($_POST['book_name'], $_POST['author'],$_POST['publisher'], $_POST["isbn"], $_POST['year']);

    print_r($book);
    echo "The book name is" . $book[0];
    echo "<br>";
    echo "The book authos is" . $book[1];
    echo "<br>";
    echo "The book publisher is" . $book[2];
    echo "<br>";
    echo "The book isbn is" . $book[3];
    echo "<br>";
    echo "The book year is" . $book[4];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <form action="q_1.php" method="post">
        <h2>Book Information</h2>

        <label for="book_name">Book Name:</label>
        <input type="text" id="book_name" name="book_name" minlength="3" required>

      
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" pattern="[A-Za-z\s]+" title="Author name should contain only letters and spaces" required>

        <label for="publisher">Publisher:</label>
        <input type="text" id="publisher" name="publisher" minlength="3" required>

      
        <label for="isbn">ISBN Number:</label>
        <input type="text" id="isbn" name="isbn" pattern="\d{10}|\d{13}" title="Enter a valid 10 or 13-digit ISBN" required>


        <label for="year">Year of Publication:</label>
        <input type="number" id="year" name="year" min="1000" max="2025" required>

        <button type="submit" name="submit">Submit</button>
    </form>

</body>
</html>
