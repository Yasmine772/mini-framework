<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        form {
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            gap: 15px;
            min-width: 300px;
        }

        input {
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        label {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>

<form method="post" action="/users/<?= $user['id'] ?>/update/">
    <h2>Edit User</h2>

    <label>Name:
        <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? $user['name']) ?>">
        <?php if (!empty($errors['name'])): ?>
            <div style="color:red; font-size:12px;"><?= htmlspecialchars($errors['name']) ?></div>
        <?php endif; ?>
    </label>

    <label>Email:
        <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? $user['email']) ?>">
        <?php if (!empty($errors['email'])): ?>
            <div style="color:red; font-size:12px;"><?= htmlspecialchars($errors['email']) ?></div>
        <?php endif; ?>
    </label>

    <button type="submit">Update</button>
    <button type="button" onclick="window.location='/'" style="background-color:#007BFF; color:white; margin-top:10px;">Back</button>
</form>

</body>
</html>
