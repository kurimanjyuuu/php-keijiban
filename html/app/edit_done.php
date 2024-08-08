<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf8">
        <title>編集</title>
    </head>

    <body>
        <div style="text-align:center">

            <?php

            $id = $_POST["id"];
            $edit_type = $_POST["edit_type"];
            $name = $_POST["name"];
            $subject = $_POST["subject"];
            $message = $_POST["message"];
            $image_path = $_POST["image_path_old"];
            $email = $_POST["email"];
            $url = $_POST["url"];
            $text_color = $_POST["text_color"];
            $delete_key = $_POST["delete_key"];
            $delete_path = $_POST["delete_path"];
            
            if (!empty($_FILES["image_path"]["name"])) {
                
                // 新しい画像があったら$_FILESで受け取って
                $filename = $_FILES["image_path"]["name"];
                // $image_pathに新しい画像pathを代入する。
                $image_path = "./image_after/" . $filename;
                $result = move_uploaded_file($_FILES["image_path"]["tmp_name"], $image_path);

                if ($result) {
                    $sql = "アップロード成功、ファイル名:" . $filename;
                    $img_path = $image_path;
                } else {
                    $sql = "アップロード失敗、エラーコード:" . $_FILES["image_path"]["error"];
                }
            }   else if ($delete_path == 1){
                $image_path = "";
                }

            $db = mysqli_connect('db', 'root', 'root', 'board');
            if (mysqli_connect_errno()) {
                die("データベースに接続できません:" . mysqli_connect_error() . "\n");
            } else {
                echo "\n";
            }

            // 更新対象の投稿内容を取得

            $edit_board = "UPDATE $edit_type SET 
                name ='{$_POST["name"]}', 
                subject = '{$_POST["subject"]}', 
                message ='{$_POST["message"]}', 
                image_path = '{$image_path}',
                email = '{$_POST["email"]}',
                url = '{$_POST["url"]}',
                text_color = '{$_POST["text_color"]}',
                delete_key = '{$_POST["delete_key"]}'
                WHERE id = '{$_POST["id"]}'";

            // クエリーを実行する。
            if (mysqli_query($db, $edit_board)) {
                echo "\n";
            } else {
                die("クエリーが失敗しました。" . mysqli_error($db) . "\n");
            }
            mysqli_close($db);
            // echo $edit_board;

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
            </form>
        </div>
    </body>
</html>