<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .home-container {
            background: #fff;
            padding: 40px 60px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 30px;
            color: #333;
        }

        .buttons a {
            display: inline-block;
            margin: 0 10px;
            padding: 12px 25px;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .buttons a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="home-container">
    <h2>Welcome to Home Page</h2>
    <div class="buttons">
        <a href="/users/create">Create User</a>
        <a href="/users">User List</a>
    </div>
</div>

</body>
</html>
