<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf8">
        <title>課題掲示板 Sample</title>
    </head>

    <body>
        <div style="text-align:center">

            <?php
                $db = mysqli_connect('db', 'root', 'root', 'board');
                //接続状況をチェックする。
                if (mysqli_connect_errno()) {
                    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
                } else {
                    echo "\n";
                }
                //DB接続完了中
                mysqli_select_db($db, "board");
                //クエリを実行する。
                $boards_result = mysqli_query($db, "SELECT * FROM boards ORDER BY id DESC;");

                // $errors = [];
                // if($_POST){
                //     $id = null;
                //     $name = $_POST["name"];
                //     // $email = $_POST["email"];
                //     if(null === $name){
                //         $errors[] .= "名前を入力してください";
                //     }
                //     if(null === $message){
                //         $errors[] .= "投稿内容を入力してください";
                //     }
                //     if(!$errors){
                //         date_default_timezone_set('Asia/Tokyo');
                //         $created_at = date("Y-m-d H:i:s");
                //         //DB接続情報を設定します。
            ?>

            <h1>掲示板 Sample</h1>
                <a href="home.php">一覧(新規投稿)</a>❘
                <a href="search_form.php">ワード検索</a>❘
                <a href="">使い方</a>❘
                <a href="">携帯へURLを送る</a>❘
                <a href="">管理</a>
        
            
            <form action="preview.php" method="POST" enctype="multipart/form-data">

                <table border="1" frame="box" rulues="none" border="black" width="600" align="center">
                    <tr>
                        <td nowrap>名前</td>
                        <td nowrap><input type="text" name="onamae"></td>
                    </tr>
                    <tr>
                        <td nowrap>件名</td>
                        <td><input type="text" name="subject"></td>
                    </tr>
                    <tr>
                        <td>メッセージ</td>
                        <td><textarea name="message" id="" cols="70" rows="10" ></textarea></td>
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
                            プレビューする<small>（投稿前に、内容をプレビューして確認できます）</small></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center">
                            <input class="radio" type="submit" name="submit" value="投稿">
                            <input class="radio" type="reset" name="reset" value="リセット">
                        </td>
                    </tr>
                </table>
            </form>
        </div>


        <div style="margin-top:20px;">
            <?php
                $link = mysqli_connect('db', 'root', 'root', 'board');

                // 接続状況をチェックします
                if (mysqli_connect_errno()) {
                    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
                }

                echo "\n";
                
                while ($boards_row = mysqli_fetch_assoc($boards_result)) { 
                    
                ?>
                
                <table border="1" frame="box" rulues="none" border="black" width="600" align="center" style="margin-top:20px;">
                    <!-- <?php var_dump($boards_row);?> -->

                    <th>
                        <div style="text-align:left">
                            <?php echo $boards_row["name"];?> -
                            <span style="color:#FF3366">
                            <?php echo $boards_row["subject"];?></span> -
                            <?php echo $boards_row["url"];?>
                        </div>
                        
                        <div style="text-align:right">
                            <?php echo date("Y年m月d日H時i分", strtotime($boards_row['created_at']));?>
                        </div>
                        <div style="text-align:left;color:<?php echo $boards_row["text_color"];?>">
                            <?php echo nl2br($boards_row["message"]);?>
                        </div>
                        <div style="text-align:center">
                            <?php $image_path = $boards_row["image_path"];?>
                            <img src="<?php echo $image_path;?>" height="250" weight="100">
                        </div>
                        <div style="display:inline-flex">
                                <!-- reply -->
                            <form action="reply.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $boards_row["id"];?>">
                                <input type="hidden" name="edit_type" value="boards">
                                <input type="hidden" name="delete_type" value="boards">
                                <input class="button" type="submit" value="返信">
                            </form>
                            <!-- edit -->
                            <form action="read_form.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $boards_row["id"];?>">
                                <input type="hidden" name="edit_type" value="boards">
                                <input class="button" type="submit" value="編集">
                            </form>
                            <!-- delete -->
                            <form action="delete_form.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $boards_row["id"];?>">
                                <input type="hidden" name="delete_type" value="boards">
                                <input class="button" type="submit" value="削除">
                            </form></br>
                        </div>
                    </th>
                </table>
        </div>
    <?php
            
        
    ?>


        <div style="margin-top:20px;">
            <?php
                $link = mysqli_connect('db', 'root', 'root', 'board');
                //接続状況をチェックする。
                if (mysqli_connect_errno()) {
                    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
                } else {
                    echo "\n";
                }
                //DB接続完了中
                mysqli_select_db($link, "board");
                //クエリを実行する。
                $replies_result = mysqli_query($link, "SELECT * FROM replies WHERE board_id = {$boards_row['id']} ORDER BY board_id DESC;");

                while ($replies_row = mysqli_fetch_assoc($replies_result)) { 
                    
                    $replies_reverse = array_reverse($replies_row);
            ?>

            <table border="1" frame="box" rulues="none" border="black" width="600" align="center">

                <th>
                    <div style="text-align:left">
                        <?php echo $replies_row["name"];?> -
                        <span style="color:#9933CC">
                        <?php echo $replies_row["subject"];?></span> -
                        <?php echo $replies_row["url"];?>
                    </div>
                    <div style="text-align:right">
                        <?php echo date("Y年m月d日H時i分", strtotime($replies_row['created_at'])); ?>
                    </div>
                    <div style="text-align:left;color:<?php echo $replies_row["text_color"]; ?>">
                        <?php echo nl2br($replies_row["message"]); ?>
                    </div>
                    <div style="text-align:center">
                        <?php $image_path = $replies_row["image_path"]; ?>
                        <img src="<?php echo $image_path; ?>" height="250" weight="100">
                    </div>
                    <div style="display:inline-flex">
                        <!-- edit -->
                        <form action="read_form.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $replies_row["id"]; ?>">
                            <input type="hidden" name="edit_type" value="replies">
                            <input class="button" type="submit" value="編集">
                        </form>
                        <!-- delete -->
                        <form action="delete_form.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $replies_row["id"]; ?>">
                            <input type="hidden" name="delete_type" value="replies">
                            <input class="button" type="submit" value="削除">
                        </form></br>
                    </div>
                </th>
            </table>
        </div>
    <?php
                
            }
        }
    
    ?>
    </body>

</html>