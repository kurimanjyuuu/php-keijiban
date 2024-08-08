<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf8">
        <title>編集読み込み</title>
    </head>

    <body>
        <div style="text-align:center">
            <?php
                $id = $_POST["id"];
                $edit_type = $_POST["edit_type"];
                // echo $edit_type;
            ?>
        
            <h1>掲示板 Sample</h1>
                <a href="home.php">一覧(新規投稿)</a>❘
                <a href="">ワード検索</a>❘
                <a href="">使い方</a>❘
                <a href="">携帯へURLを送る</a>❘
                <a href="">管理</a>
                
            <p><br>編集/削除キーを入力し、［送信］して下さい。<br></p>
            <form action="read_complete.php" method="POST" enctype="multipart/form-data">

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