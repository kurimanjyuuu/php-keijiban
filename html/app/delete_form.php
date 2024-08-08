<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf8">
        <title>削除読み込み</title>
    </head>

    <body>
        <div style="text-align:center">
            <?php
                $id = $_POST["id"];
                $delete_type = $_POST["delete_type"];
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
            <form action="delete_complete.php" method="POST" enctype="multipart/form-data">

                <table border="1" align="center">
                    <tr>
                        <td><input type="password" name="delete_key" value="" maxlength="8"></td>
                        <td><input class="button" type="submit" name="" value="送信"></td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="delete_type" value="<?php echo $delete_type; ?>">
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>