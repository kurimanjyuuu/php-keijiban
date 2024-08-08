<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf8">
        <title>編集読み込み２</title>
    </head>

    <body>
        <div style="text-align:center">

            <?php

                $id = $_POST["id"];
                $edit_type = $_POST["edit_type"];
                $user_edit_key = $_POST["delete_key"];
                $db = mysqli_connect('db', 'root', 'root', 'board');
                // echo $edit_type;
                if ($edit_type === "boards") {
                    $sql = "SELECT * FROM boards WHERE id = $id;";
                    $result = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        // var_dump($row);

                        if ($row["delete_key"] == $user_edit_key) {

                            // 処理 逆から辿る。repliesからboards

                            $edit_replies = "SELECT * FROM replies WHERE board_id = $id;";
                            $replise_sql = mysqli_query($db, $edit_replies);

                            $edit_boards = "SELECT * FROM boards WHERE id = $id;";
                            $boards_sql = mysqli_query($db, $edit_boards);

                            echo "\n";
                        } else {
                            // パスワード間違ってる処理
                            echo "パスワードが違います。\n";
                        }
                    }

                    echo "\n";
                } else if ($edit_type === "replies") {
                    $sql = "SELECT * FROM replies WHERE id = $id;";
                    $result = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {

                        if ($row["delete_key"] == $user_edit_key) {

                            $replies = "SELECT * FROM replies WHERE id = $id;";
                            $bds_sql = mysqli_query($db, $replies);
                            echo "\n";
                        } else {
                            // パスワード間違ってる処理
                            echo "パスワードが違います。\n";
                        }
                    }
                }

            ?>

            <h1>掲示板 Sample</h1>
            <a href="home.php">一覧(新規投稿)</a>❘
            <a href="search_form.php">ワード検索</a>❘
            <a href="">使い方</a>❘
            <a href="">携帯へURLを送る</a>❘
            <a href="">管理</a>
        

            <p><br>編集/削除キーを入力し、［送信］して下さい。<br></p>
            <form action="edit.php" method="POST" enctype="multipart/form-data">
            
                <table border="1" align="center">
                    <tr>
                        <td><input type="password" name="delete_key" value="" maxlength="8"></td>
                        <td><input class="button" type="submit" name="" value="送信"></td>
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="edit_type" value="<?php echo $edit_type;?>">
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>