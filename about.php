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
    <title>About Us - Library Management System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #f9fafb;
            color: #333;
        }
        h1 {
            color: #007bff;
            margin-bottom: 15px;
        }
        p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }
        a:hover {
            text-decoration: underline;
        }
        header {
            margin-bottom: 40px;
        }
        .btn-back {
            display: inline-block;
            margin-top: 30px;
            background-color: #007bff;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>About Us</h1>
        <p>Welcome to the Library Management System. Our mission is to simplify and enhance the way libraries operate by providing a user-friendly platform that helps manage books, authors, and years of publication effortlessly.</p>
    </header>

    <section>
        <h2>Our Vision</h2>
        <p>We aim to empower libraries of all sizes to efficiently organize their collections, improve user experience, and embrace digital management solutions. We believe that access to knowledge should be seamless and enjoyable.</p>
    </section>

    <section>
        <h2>What We Offer</h2>
        <ul>
            <li>A straightforward interface to add, view, and manage books.</li>
            <li>Secure user authentication to protect your library data.</li>
            <li>Easy navigation and responsive design to work well on any device.</li>
            <li>Future enhancements to support advanced features like search, categories, and user borrowing history.</li>
        </ul>
    </section>

    <section>
        <h2>Contact Us</h2>
        <p>If you have questions, suggestions, or want to collaborate, feel free to reach out at <a href="mailto:support@librarysystem.com">support@librarysystem.com</a>.</p>
    </section>

    <a class="btn-back" href="index.php">← Back to Home</a>
</body>
</html>
