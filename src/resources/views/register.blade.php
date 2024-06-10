<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧 | {{config('app.name')}}</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .posts-list {
            width: 80%;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .frame {
            border: 1px solid #000; /* 黒のフレーム枠 */
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            text-align: left;
        }
        .frame p {
            margin: 5px 0;
        }
        .comment {
            border: 1px solid #ccc; /* 薄いグレーのフレーム枠 */
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
            background-color: #f9f9f9;
        }
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px; /* ボタンの上部の余白を減らす */
        }
        .action-buttons form {
            display: inline-block;
            margin-left: 5px;
        }
        .action-buttons button {
            padding: 5px 10px;
            font-size: 14px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .edit-button {
            background-color: #ffc107;
        }
        .edit-button:hover {
            background-color: #e0a800;
        }
        .delete-button {
            background-color: #dc3545;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="posts-list">
        <h1>投稿一覧</h1>
        @foreach($posts as $post)
            <div class="frame">
                <p>No: {{$post->id}}</p>
                <p>タイトル: {{$post->title}}</p>
                <p>本文</p>
                <div class="comment">       
                    <p>{{$post->comment}}</p>
                </div>
                <div class="action-buttons">
                    <form method="get" action="/editing">
                        <button class="edit-button" name="id" value="{{$post->id}}">編集</button>
                    </form>
                    <form method="post" action="/destroy">
                        @csrf
                        <button class="delete-button" name="id" value="{{$post->id}}">削除</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
