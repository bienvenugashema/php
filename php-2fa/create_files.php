<?php
$dir = 'admin-with-mwimule';
if (!is_dir($dir)) {
    mkdir($dir);
}

$files = [
    'index.php' => '<?php
// Redirect to the dashboard page
header("Location: dashboard.php");
exit();
?>',

    'style.css' => '/* Custom styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}
header, footer {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}
nav ul {
    list-style: none;
    padding: 0;
}
nav ul li {
    display: inline;
    margin: 0 10px;
}
nav ul li a {
    color: #fff;
    text-decoration: none;
}',

    'scripts.js' => '// Custom JavaScript
document.addEventListener(\'DOMContentLoaded\', function() {
    console.log(\'Admin dashboard loaded\');
});',

    'header.php' => '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>',

    'footer.php' => '    <footer>
        <p>&copy; 2025 Admin Dashboard</p>
    </footer>
    <script src="scripts.js"></script>
</body>
</html>',

    'dashboard.php' => '<?php include \'header.php\'; ?>
<main>
    <h2>Dashboard</h2>
    <p>Welcome to the admin dashboard.</p>
</main>
<?php include \'footer.php\'; ?>',

    'users.php' => '<?php include \'header.php\'; ?>
<main>
    <h2>Manage Users</h2>
    <p>Here you can manage users.</p>
</main>
<?php include \'footer.php\'; ?>',

    'settings.php' => '<?php include \'header.php\'; ?>
<main>
    <h2>Settings</h2>
    <p>Here you can change settings.</p>
</main>
<?php include \'footer.php\'; ?>',

    'login.php' => '<?php
// Login logic here
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </main>
</body>
</html>',

    'logout.php' => '<?php
// Logout logic here
session_start();
session_destroy();
header("Location: login.php");
exit();
?>',

    '.htaccess' => '# Security & routing
Options -Indexes
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php [L]',

    'README.md' => '# Admin Dashboard

This is a simple PHP-based admin dashboard.

## Directory Structure

- `style.css`: Contains custom styles.
- `scripts.js`: Contains custom JavaScript.
- `header.php`: Contains the header and navigation.
- `footer.php`: Contains the footer.
- `dashboard.php`: Admin dashboard page.
- `users.php`: Manage users page.
- `settings.php`: Admin settings page.
- `login.php`: Admin login page.
- `logout.php`: Logout logic.
- `index.php`: Redirects to the dashboard.
- `.htaccess`: Contains security and routing rules.

## Setup

1. Clone the repository.
2. Place it in your web server\'s root directory.
3. Access the admin dashboard via your web browser.'
];

foreach ($files as $filename => $content) {
    file_put_contents($dir . '/' . $filename, $content);
}

echo "Files created successfully in the 'admin-with-mwimule' directory.";
?>