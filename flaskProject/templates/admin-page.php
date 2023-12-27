<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Административная панель</title>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <style>
        body {
            font-family: 'Playfair Display', sans-serif;
            font-size: 18px;
            color: #333;
            background-color: #fff;
        }

        h1 {
            font-size: 36px;
            font-weight: 700;
            margin-top: 0;
        }

        .admin-page {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .admin-page .button {
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <h1>Административная панель</h1>

    <div class="admin-page">
        <button class="button" onclick="openPage('edit-content')">Изменение контента</button>
        <button class="button" onclick="openPage('add-content')">Добавление контента</button>
        <button class="button" onclick="openPage('delete-content')">Удаление контента</button>
    </div>

    <script>
        function openPage(page) {
            window.location.href = `/admin/${page}`;
        }
    </script>
</body>
</html>