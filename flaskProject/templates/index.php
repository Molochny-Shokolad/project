<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Молочный шоколад</title>
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

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 700;
            color: #fff;
            background-color: #000;
            text-decoration: none;
        }

        .button:hover {
            background-color: #ccc;
        }

        .admin-login {
            text-align: center;
            margin-top: 20px;
        }

        .admin-login input {
            width: 200px;
            height: 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .admin-login button {
            margin-top: 20px;
            width: 200px;
            height: 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 700;
            color: #fff;
            background-color: #000;
            text-decoration: none;
        }

        .admin-page {
            display: none;
        }
    </style>
</head>
<body>
    <h1>Молочный шоколад</h1>

    <div class="image-container">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Milk_chocolate_bar.jpg/1200px-Milk_chocolate_bar.jpg" class="image">
    </div>

    <p>Молочный шоколад - это один из самых популярных видов шоколада в мире. Он изготавливается из какао-бобов, молока и сахара.</p>

    <p>Молочный шоколад обладает множеством полезных свойств. Он содержит антиоксиданты, которые помогают защитить организм от повреждений, вызванных свободными радикалами. Молочный шоколад также является хорошим источником магния, который необходим для здоровья костей и мышц.</p>

    <p>Однако молочный шоколад также может быть вреден для здоровья, если его употреблять в больших количествах. Молочный шоколад содержит много сахара, который может привести к увеличению веса и развитию заболеваний, связанных с сахарным диабетом.</p>

    <a href="/about" class="button">О молочном шоколаде</a>
    <a href="/recipes" class="button">Рецепты с молочным шоколадом</a>
    <a href="/history" class="button">История молочного шоколада</a>

    <div class="admin-login">
        <input type="text" placeholder="Имя пользователя">
        <input type="password" placeholder="Пароль">
        <button onclick="login()">Войти</button>
    </div>

    <script>
       function login() {
    const username = document.querySelector(".admin-login input[type='text']").value;
    const password = document.querySelector(".admin-login input[type='password']").value;

    if (username === "admin" && password === "secret") {
        window.location.href = "/admin_page";
    } else {
        alert("Неправильный логин или пароль");
    }
}
    </script>
</body>
</html>