<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
            display: flex;
            justify-content: center;
        }

        .users-container {
            width: 600px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .user-card {
            background: #fff;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            text-decoration: none;
        }

        .user-name:hover {
            text-decoration: underline;
        }

        .user-email {
            color: #555;
            font-size: 14px;
        }

        .actions a {
            margin-left: 10px;
            text-decoration: none;
            color: #007BFF;
            font-size: 14px;
        }

        .actions a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

<div class="users-container">
    <h2>Users List</h2>
    <?php foreach ($users as $user): ?>
        <div class="user-card">
            <div class="user-info">
                <a href="/users/<?= $user['id'] ?>" class="user-name"><?= htmlspecialchars($user['name']) ?></a>
                <div class="user-email"><?= htmlspecialchars($user['email']) ?></div>
            </div>
            <div class="actions">
                <a href="/users/<?= $user['id'] ?>">Show</a>
                <a href="/users/<?= $user['id'] ?>/edit">Edit</a>
                <form action="/users/<?= $user['id'] ?>/delete" method="post" style="display:inline;">
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this user?');"
                            style="background:none; border:none; color:#FF0000; cursor:pointer; font-size:14px;">
                        Delete
                    </button>
                </form>


            </div>

        </div>
    <?php endforeach; ?>
</div>
<div style="text-align: right; margin-top: 20px;">
    <button onclick="window.location='/'" style="padding:10px 20px; background-color:#007BFF; color:white; border:none; border-radius:5px; cursor:pointer; font-size:14px;">
        Back
    </button>
</div>
</body>
</html>
