<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Access Denied</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #222; 
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        text-align: center;
        padding: 20px;
        background-color: #333; 
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); 
    }
    h1 {
        color: #fff; 
    }
    p {
        color: #ccc; 
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 20px;
        background-color: #ff5a5f;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .btn:hover {
        background-color: #d6343c; 
    }
</style>
</head>
<body>

<div class="container">
    <h1>Access Denied</h1>
    <p>Please log in to access this page.</p>
    <a href="login.php" class="btn">Log In</a>
</div>

</body>
</html>
