<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf8">
        <title>完了</title>
    </head>

    <body>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $subject = $_POST["subject"];
                $message = $_POST["message"];
                $image_path = $_POST["image_path"];
                $email = $_POST["email"];
                $url = $_POST["url"];
                $text_color = $_POST["text_color"];
                $delete_key = $_POST["delete_key"];
                date_default_timezone_set('Asia/Tokyo');
                $created_at = date('Y-m-d H:i:s');
            };

            $link = mysqli_connect('db', 'root', 'root', 'board');
            if (mysqli_connect_errno()) {
                die("データベースに接続できません:" . mysqli_connect_error() . "\n");
            } else {
                echo "\n";
            }
            //DB接続完了中
            mysqli_select_db($link, "board");
            //クエリを実行する。
            $query = "INSERT INTO boards (name, subject, message, email, image_path, url, text_color, created_at, delete_key) 
                    VALUE ('$name', '$subject', '$message', '$email', '$image_path', '$url', '$text_color', '$created_at', '$delete_key')";

            if (mysqli_query($link, $query)) {
                echo "\n";
            } else {
                die("クエリーが失敗しました。" . mysqli_error($link) . "\n");
            }
            mysqli_close($link);

        
        ?>




        <div style="text-align:center">
            <h1>掲示板 Sample</h1>
            
                <a href="home.php">一覧(新規投稿)</a>❘
                <a href="search_form.php">ワード検索</a>❘
                <a href="">使い方</a>❘
                <a href="">携帯へURLを送る</a>❘
                <a href="">管理</a>
            
            
            <p><h2>投稿完了!!</h2></p>






            ▼この掲示板をケータイで見る</br>
            <img src=""></br>

            <p><a href="home.php">掲示板へ戻る</a></p>

        </div>
    </body>
</html>