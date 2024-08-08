<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf8">
        <title>削除</title>
    </head>
    <body>
        <div style="text-align:center">

            <?php

                $id = $_POST["id"];
                $delete_type = $_POST["delete_type"];
                $user_delete_key = $_POST["delete_key"];
                $db = mysqli_connect('db', 'root', 'root', 'board');
                // echo $delete_type;
                if ($delete_type === "boards") {
                    $sql = "SELECT * FROM $delete_type WHERE id = $id;";
                    $result = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        
                        if ($row["delete_key"] == $user_delete_key) {

                            // 削除処理 逆から辿る。repliesからboards

                            $delete_replies = "DELETE FROM replies WHERE board_id = $id;";
                            $replise_sql = mysqli_query($db, $delete_replies);

                            $delete_boards = "DELETE FROM boards WHERE id = $id;";
                            $boards_sql = mysqli_query($db, $delete_boards);

                            echo "\n";
                        } else {
                            // パスワード間違ってる処理
                            echo "パスワードが違います。\n";
                        }
                    }

                    echo "\n";
                } else if ($delete_type === "replies") {
                    $sql = "SELECT * FROM $delete_type WHERE id = $id;";
                    $result = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {

                        if ($row["delete_key"] == $user_delete_key) {

                            $replies = "DELETE FROM replies WHERE id = $id;";
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
        
            <br>
                <p>編集/削除キーを入力し、［送信］して下さい。</p>
            <br>
            <form action="home.php" method="POST" enctype="multipart/form-data">
                <?php
                $db = mysqli_connect('db', 'root', 'root', 'board');
                if ($_POST["delete_key"]) {
                    $delete_key = $_POST["delete_key"];
                    $conects = $db->query("DELETE boards WHERE delete_key ='" . $id . "'");
                }
                // header(“Location:https:”);
                // exit();
                ?>
                <table border="1" align="center">
                    <tr>
                        <td><input type="password" name="delete_key" value="" maxlength="8"></td>
                        <td><input class="button" type="submit" name="" value="送信"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>