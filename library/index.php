<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library Management System</title>
    <style>
        /* Reset some default styles */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9fafb;
            color: #333;
            padding: 40px 20px;
            max-width: 900px;
            margin: 0 auto;
        }

        p {
            font-size: 16px;
            margin-bottom: 30px;
        }

        p a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }
        p a:hover {
            text-decoration: underline;
        }

        h2 {
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 25px;
            color: #222;
            border-bottom: 2px solid #007bff;
            padding-bottom: 8px;
        }

        /* Form styling */
        form#bookForm {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        form#bookForm input[type="text"],
        form#bookForm input[type="number"] {
            flex: 1 1 200px;
            padding: 12px 15px;
            font-size: 1rem;
            border: 1.8px solid #ddd;
            border-radius: 6px;
            transition: border-color 0.3s ease;
            outline-offset: 2px;
        }

        form#bookForm input[type="text"]:focus,
        form#bookForm input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
        }

        form#bookForm button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
            flex-shrink: 0;
        }

        form#bookForm button:hover {
            background-color: #0056b3;
        }

        /* Table styling */
        table#booksTable {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        table#booksTable thead tr {
            background-color: #007bff;
            color: white;
            font-weight: 700;
        }

        table#booksTable th, table#booksTable td {
            padding: 15px 20px;
            text-align: left;
        }

        table#booksTable tbody tr {
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: transform 0.15s ease;
        }

        table#booksTable tbody tr:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }

        /* Action button inside the table */
        table#booksTable td button {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 7px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        table#booksTable td button:hover {
            background-color: #a71d2a;
        }
    </style>
</head>
<body>
<p>Welcome, <?php echo $_SESSION['username']; ?> | <a href="logout.php">Logout</a></p>
<h2>Library Management System</h2>
<section style="background-color:#e9f0ff; border: 1px solid #007bff; padding: 15px 20px; border-radius: 8px; margin-bottom: 30px;">
    <h3 style="margin-top:0; color:#0056b3;">Learn More About Us</h3>
    <p>Discover the purpose and vision behind our Library Management System.</p>
    <a href="about.php" style="font-weight:600; color:#007bff; text-decoration:none;">Go to About Us &raquo;</a>
</section>


<!-- FORM -->
<form id="bookForm" method="POST">
    <input type="text" name="title" placeholder="Book Title" required>
    <input type="text" name="author" placeholder="Author" required>
    <input type="number" name="published_year" placeholder="Published Year" required>
    <button type="submit">Add Book</button>
</form>

<!-- TABLE -->
<table id="booksTable">
    <thead>
        <tr><th>Title</th><th>Author</th><th>Year</th><th>Action</th></tr>
    </thead>
    <tbody></tbody>
</table>

<!-- SCRIPT -->
<script src="script.js"></script>
</body>
</html>
