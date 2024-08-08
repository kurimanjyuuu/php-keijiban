<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf8">
        <title>返信</title>
    </head>



    <body>
        <div style="text-align:center">

            <?php
                $edit_type = $_POST["edit_type"];
                $delete_type = $_POST["delete_type"];
                $db = mysqli_connect('db', 'root', 'root', 'board');
                if ($_POST["id"]) {
                    $id = $_POST["id"];
                    $conects = $db->query("SELECT * FROM boards WHERE id='" . $id . "'");
                }
            ?>


            <h1>掲示板 Sample</h1>
            <a href="home.php">一覧(新規投稿)</a>❘
            <a href="search_form.php">ワード検索</a>❘
            <a href="">使い方</a>❘
            <a href="">携帯へURLを送る</a>❘
            <a href="">管理</a>
    
            <table border=1 frame="box" rulues="none" border="black" width="600" align="center">

                <th><?php foreach ($conects as $conect);?>
                    <div style="text-align:left">
                        <?php echo ($conect['name']); ?> -
                        <?php echo ($conect['subject']) . '<br>'; ?>  -
                        <?php echo ($conect['url']);?>
                    </div>
                    <div style="text-align:right">
                        <?php echo ($conect['created_at']) . '<br>'; ?>
                    </div>
                    <div style="text-align:left;color:<?php echo $conect["text_color"]; ?>">
                        <?php echo ($conect['message']) . '<br>'; ?>
                    </div>
                    <div style="text-align:center">
                        <img src="<?php echo ($conect['image_path']); ?>" height="250" weight="100">
                    </div>

                    <div style="display:inline-flex">
                        <!-- edit -->
                        <form class="inline_button" action="read_form.php" method="POST" enctype="multipart/form-data">
                            <input class="button" type="submit" value="編集">
                            <input type="hidden" name="id" value="<?php echo $_POST["id"];?>">
                            <input type="hidden" name="edit_type" value="<?php echo $edit_type;?>"> 
                        </form>
                        <!-- delete -->
                        <form class="inline_button" action="delete_form.php" method="POST" enctype="multipart/form-data">
                            <input class="button" type="submit" value="削除">
                            <input type="hidden" name="id" value="<?php echo $_POST["id"];?>">
                            <input type="hidden" name="delete_type" value="<?php echo $delete_type;?>"> 
                        </form><br>
                    </div>
                </th>
            </table>

            <p>
            <form action="reply_preview.php" method="POST" enctype="multipart/form-data">
                <table border=1 frame="box" rulues="none" border="black" width="600" align="center">
                    <tr>
                        <td nowrap>名前</td>
                        <td nowrap><input type="text" name="onamae"></td>
                    </tr>
                    <tr>
                        <td nowrap>件名</td>
                        <td><input type="text" name="subject" value="Re:"></td>
                    </tr>
                    <tr>
                        <td>メッセージ</td>
                        <td><textarea name="message" id="" cols="48" row="7"></textarea></td>
                    </tr>
                    <tr>
                        <td nowrap>画像</td>
                        <td><input size="30" type="file" name="image_path"></td>
                    </tr>
                    <tr>
                        <td nowrap>メールアドレス</td>
                        <td><input type="email" name="email"></td>
                    </tr>
                    <tr>
                        <td nowrap>URL</td>
                        <td><input type="text" name="url" value="http://"></td>
                    </tr>

                    <tr>
                        <td nowrap>文字色</td>
                        <td>
                            <input type="radio" name="text_color" value="red" checked>
                            <span style="color:red">■</span>
                            <input type="radio" name="text_color" value="green" checked>
                            <span style="color:green">■</span>
                            <input type="radio" name="text_color" value="blue" checked>
                            <span style="color:blue">■</span>
                            <input type="radio" name="text_color" value="purple" checked>
                            <span style="color:purple">■</span>
                            <input type="radio" name="text_color" value="fuchsia" checked>
                            <span style="color:fuchsia">■</span>
                            <input type="radio" name="text_color" value="orange" checked>
                            <span style="color:orange">■</span>
                            <input type="radio" name="text_color" value="navy" checked>
                            <span style="color:navy">■</span>
                            <input type="radio" name="text_color" value="gray" checked>
                            <span style="color:gray">■</span>
                        </td>
                    </tr>
                    <tr>
                        <td nowrap>編集/削除キー</td>
                        <td><input type="password" name="delete_key" maxlength="8"></br>
                            <small>(半角英数字のみで4～8文字)</small>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" nowrap><input class="radio" type="checkbox" name="preview" value="1">
                            プレビューする<small>（投稿前に、内容をプレビューして確認できます</small></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center">
                            <input class="radio" type="submit" name="submit" value="投稿">
                            <input type="hidden" name="board_id" value="<?php echo $id; ?>">
                            <input class="radio" type="reset" name="reset" value="リセット">
                        </td>
                    </tr>
                </table>
            </form>
            </p>
        </div>
    </body>

</html>