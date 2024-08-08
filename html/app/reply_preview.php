<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf8">
        <title>返信プレビュー</title>
    </head>

    <body>
        <div style="text-align:center">

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $board_id = $_POST["board_id"];
                $name = $_POST["onamae"];
                $subject = $_POST["subject"];
                $message = $_POST["message"];
                $email  = $_POST["email"];
                $url = $_POST["url"];
                $text_color = $_POST["text_color"];
                $delete_key = $_POST["delete_key"];

            };


            if (!empty($_POST["preview"])) {

            ?>


                <h1>掲示板 Sample</h1>
                <a href="home.php">一覧(新規投稿)</a>❘
                <a href="search_form.php">ワード検索</a>❘
                <a href="">使い方</a>❘
                <a href="">携帯へURLを送る</a>❘
                <a href="">管理</a>
            

                <p>以下の内容でよろしければ、「このまま投稿する」ボタンを押してください。</br>
                    戻って修正する場合は、「戻って修正する」ボタンでお戻りください。</p></br>

                <form action="reply_complete.php" method="POST" enctype="multipart/form-data">

                    <table border=1 frame="box" rulues="none" border="black" width="600" align="center">

                        <tr style="text-align:left">
                            <th nowrap>名前:</th>
                            <input type="hidden" name="name" value="<?php echo $_POST["onamae"]; ?>">
                            <td><?php echo $name; ?></td>
                        </tr>
                        <tr style="text-align:left">
                            <th nowrap>件名:</th>
                            <input type="hidden" name="subject" value="<?php echo $_POST["subject"]; ?>">
                            <td><?php echo $subject; ?></td>
                        </tr>
                        <tr style="text-align:left">
                            <th nowrap class="lh12">メッセージ:</br><small style="color:<?php echo $text_color; ?>;">(文字色■)</small>
                                <input type="hidden" name="text_color" value="<?php echo $text_color; ?>">
                            </th>
                            <input type="hidden" name="message" value="<?php echo $_POST["message"]; ?>">
                            <td><?php echo $message; ?></td>
                        </tr>
                        <tr style="text-align:left">
                            <th nowrap>画像:</th>
                            <?php

                                if (!empty($_FILES["image_path"]["name"])) {
                                    $filename = $_FILES["image_path"]["name"];
                                    $image_path = "./image_after/" . $filename;
                                    $result = move_uploaded_file($_FILES["image_path"]["tmp_name"], $image_path);

                                    if ($result) {
                                        $sql = "アップロード成功、ファイル名:" . $filename;
                                        $img_path = $image_path;
                                    } else {
                                        $sql = "アップロード失敗、エラーコード:" . $_FILES["image_path"]["error"];
                                    }
                                } else {
                                    $image_path ="";
                                } 

                            ?>
                            <input type="hidden" name="image_path" value="<?php echo $image_path; ?>">
                            <td style="text-align:left"><img src="<?php echo $image_path; ?>" height="250" weight="100"></td>
                        </tr>
                        <tr style="text-align:left">
                            <th nowrap>メールアドレス:</th>
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr style="text-align:left">
                            <th nowrap>ホームページ:</th>
                            <input type="hidden" name="url" value="<?php echo $_POST["url"]; ?>">
                            <td><?php echo $url; ?></td>
                        </tr>
                        <tr style="text-align:left">
                            <th nowrap>編集/削除キー</th>
                            <input type="hidden" name="delete_key" value="<?php echo $_POST["delete_key"]; ?>">
                            <td><?php echo $delete_key; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:canter">
                                <button type="button" onclick=history.back()>戻って修正する</button>
                                <input type="hidden" name="board_id" value="<?php echo $board_id; ?>">
                                <input class="button" onclick="location.href='./com.php'" type="submit" value="このまま投稿する">
                            </td>
                        </tr>   
                    </table>
                </form>

            <?php

            } else {

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $board_id = $_POST["board_id"];
                    $name = $_POST["onamae"];
                    $subject = $_POST["subject"];
                    $message = $_POST["message"];
                    $image_path;
                    $email = $_POST["email"];
                    $url = $_POST["url"];
                    $text_color = $_POST["text_color"];
                    $delete_key = $_POST["delete_key"];
                    date_default_timezone_set('Asia/Tokyo');
                    $created_at = date('Y-m-d H:i:s');
                };


                if (!empty($_FILES["image_path"]["name"])) {

                    $filename = $_FILES["image_path"]["name"];

                    $image_path = "./image_after/" . $filename;
                    $result = move_uploaded_file($_FILES["image_path"]["tmp_name"], $image_path);

                    if ($result) {
                        $sql = "アップロード成功、ファイル名:" . $filename;
                        $img_path = $image_path;
                    } else {
                        $sql = "アップロード失敗、エラーコード:" . $_FILES["image_path"]["error"];
                    }

                } else {
                    $image_path ="";
                }

                $db = mysqli_connect('db', 'root', 'root', 'board');
                if (mysqli_connect_errno()) {
                    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
                } else {
                    echo "\n";
                }
                //DB接続完了中
                mysqli_select_db($db, "board");
                //クエリを実行する。
                $query = "INSERT INTO replies (board_id, name, subject, message, email, image_path, url, text_color, created_at, delete_key) 
                    VALUE ('$board_id', '$name', '$subject', '$message', '$email', '$image_path', '$url', '$text_color', '$created_at', '$delete_key')";

                if (mysqli_query($db, $query)) {
                    echo "\n";
                } else {
                    die("クエリーが失敗しました。" . mysqli_error($db) . "\n");
                }
                mysqli_close($db);

            ?>

                <div style="text-align:center">
                    <h1>掲示板 Sample</h1>
                    
                    <p id="navi_bar"><a href="home.php">一覧(新規投稿)</a>❘
                    <a href="search_form.php">ワード検索</a>❘
                    <a href="">使い方</a>❘
                    <a href="">携帯へURLを送る</a>❘
                    <a href="">管理</a></p>

                    <p><big>投稿完了!!</big></p>

                    ▼この掲示板をケータイで見る</br>
                    <img src=""></br>

                    <p><a href="home.php">掲示板へ戻る</a></p>
                </div>

            <?php } ?>
        </div>
    </body>
</html>