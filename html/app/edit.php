<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf8">
        <title>編集</title>
    </head>

    <body>
        <div style="text-align:center">
            <?php
                $edit_type = $_POST["edit_type"];
                $id = $_POST["id"];
               
               
                //更新対象の投稿内容を取得
                $db = mysqli_connect('db', 'root', 'root', 'board');
                
                if ($_POST["id"]) {
                    $id = $_POST["id"];
                    $conects = $db->query("SELECT * FROM $edit_type WHERE id ='" . $id . "'");
                    
                    
                } 
                
            ?>
                <h1>掲示板 Sample</h1>
                <p id="navi_bar">
                    <a href="home.php">一覧(新規投稿)</a>❘
                    <a href="search_form.php">ワード検索</a>❘
                    <a href="">使い方</a>❘
                    <a href="">携帯へURLを送る</a>❘
                    <a href="">管理</a>
                </p>

            <form class="inline_button" action="edit_done.php" method="POST" enctype="multipart/form-data">
                <table border="0" frame="box" rulues="none" border="black" width="600" align="center">
                    <?php foreach ($conects as $conect);?>

                    <tr style="text-align:left">
                        <td nowrap>名前</td>
                        <td>
                            <input type="text" name="name" value="<?php echo ($conect['name']);?>">
                        </td>
                    </tr>
                    <tr style="text-align:left">
                        <td nowrap>件名</td>
                        <td>
                            <input type="text" name="subject" value="<?php echo ($conect['subject']);?>">
                        </td>
                    </tr>
                    <tr style="text-align:left">
                    <td nowrap>メッセージ</td>
                        <td>
                            <input type="text" name="message" value="<?php echo ($conect['message']);?>">
                        </td>
                    </tr>

                    <tr style="text-align:left">
                        <td nowrap>画像</td>
                        <td><input type="file" name="image_path"></td>  
                    </tr>
                    
                    <tr>
                        <td colspan="2" style="text-align:center">
                            <small>※新しい画像をアップロードすると現在の画像は削除されます。</small>
                        </td>
                    </tr>
                    <tr>
                    <td colspan="2" nowrap>
                        <small>
                            ▽現在の画像を削除する。(<input type='hidden' value='0' name='delete_path'>
                            <input class="radio" type="checkbox" name="delete_path" value="1">この画像を削除する。)    
                        </small>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center">
                            <img src="<?php echo ($conect['image_path']);?>" height="250" weight="100">
                            
                            <input type="hidden" name="image_path_old" value="<?php echo ($conect['image_path']);?>">
                        </td>
                    </tr>
                    
                    

                    <tr style="text-align:left">
                        <td nowrap>メールアドレス</td>
                        <td>
                        <input type="text" name="email" value="<?php echo ($conect['email']);?>">
                        </td>
                    </tr>
                    <tr style="text-align:left">
                        <td nowrap>URL</td>
                        <td>
                            <input type="text" name="url" value="<?php echo ($conect['url']);?>">
                        </td>
                    </tr>
                    <tr style="text-align:left">
                        <td nowrap>文字色</th>
                        <td nowrap style="text-align:center">
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
                    <tr style="text-align:left">
                        <td nowrap>編集/削除キー<br><small>(半角英数字のみで4～8文字)<br></small></td>
                        <td>    
                            <input type="password" name="delete_key" maxlength="8"></br>
                        </td>
                    </tr>
                    <td colspan="2" style="text-align:center">
                        ※編集時はプレビュー機能を使えません。
                    </td>
                    <tr style="text-align:center">
                        <td colspan="2" style="text-align:center">
                            <input class="button" type="submit" value="編集">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="hidden" name="edit_type" value="<?php echo $edit_type;?>">
                        </td>
                    </tr>  
                </table>
            </form><br>
        </div>
    </body>
</html>