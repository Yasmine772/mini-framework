<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>500 - Internal Server Error</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: #f4f4f4;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .box {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: #d9534f; /* Red */
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 20px;
            font-size: 18px;
            color: #444;
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
        }

        a.button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>500 - Something went wrong</h1>
    <p>Please try later.</p>
    <a href="/users" class="button">Go Back</a>
</div>

</body>
</html>
