<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新規投稿 | {{config('app.name')}}</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .post-container {
            width: 80%;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-button {
            background-color: #007BFF;
        }
        .submit-button:hover {
            background-color: #0056b3;
        }
        .cancel-button {
            background-color: #6c757d;
        }
        .cancel-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="post-container">
        <h1>新規投稿</h1>
        <form method="post" action="/register">
            @csrf
            <input type="text" name="title" id="title" placeholder="記事タイトル" required autofocus>
            <textarea name="content" placeholder="ここに内容を入力してください。" rows="5" required></textarea>
            <div class="button-container">
                <button type="button" class="cancel-button" onclick="window.location.href='/';">キャンセル</button>
                <button type="submit" class="submit-button">投稿</button>
            </div>
        </form>
    </div>
</body>
</html>
