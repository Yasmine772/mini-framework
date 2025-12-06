<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show User</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding-top: 50px;
        }

        .user-details {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 450px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .user-row {
            display: flex;
            justify-content: space-between;
        }

        .label {
            font-weight: bold;
            color: #333;
        }

        .value {
            color: #555;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #007BFF;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="user-details">
    <h2>User Details</h2>
    <div class="user-row">
        <div class="label">Name:</div>
        <div class="value"><?= htmlspecialchars($user['name']) ?></div>
    </div>
    <div class="user-row">
        <div class="label">Email:</div>
        <div class="value"><?= htmlspecialchars($user['email']) ?></div>
    </div>

    <a href="/users" class="back-link">Back</a>
</div>

</body>
</html>
