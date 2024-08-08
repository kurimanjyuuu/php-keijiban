<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf8">
        <title>ワード検索２</title>
    </head>

    <body>
        
        <?php
            $andor = $_POST["andor"];
            $db = mysqli_connect('db', 'root', 'root', 'board');
            //接続状況をチェックする。
            if (mysqli_connect_errno()) {
                die("データベースに接続できません:" . mysqli_connect_error() . "\n");
            } else {
                echo "\n";
            }

            $keyword = $_POST['keyword'];
            if(strpos($keyword,' ')){
                $keywords = explode(' ',$keyword);
                
            } else {
                $keywords = explode('　',$keyword);
                
            } 
            
            // echo $keywords[0];
            
            if (count($keywords) >= 2)  { 
                    $sql = "SELECT  name, subject, url, created_at, text_color, message, image_path 
                    FROM boards WHERE message LIKE '%$keywords[0]%' 
                    $andor message LIKE '%$keywords[1]%'
                    UNION SELECT  name, subject, url, created_at, text_color, message, image_path 
                    FROM replies WHERE message LIKE '%$keywords[0]%' 
                    $andor message LIKE '%$keywords[1]%'; " ;
            }   else   {
                    $sql = "SELECT  name, subject, url, created_at, text_color, message, image_path 
                    FROM boards WHERE message LIKE '%$keywords[0]%' 
                    UNION SELECT  name, subject, url, created_at, text_color, message, image_path 
                    FROM replies WHERE message LIKE '%$keywords[0]%'; ";
            }


            // OR検索version
            // ORを変数にすればANDも取得できる。
    
            $sql = "SELECT

                    boards.id AS b_id,
                    boards.name AS b_name,

                    replies.id AS r_id,
                    replies.name AS r_name

                    FROM boards
                    LEFT JOIN replies ON boards.id = replies.board_id
                    WHERE
                    boards.message LIKE '%{$keywords[0]}%' OR
                    boards.message LIKE '%{$keywords[1]}%' OR

                    replies.message LIKE '%{$keywords[0]}%' OR
                    replies.message LIKE '%{$keywords[1]}%';"


            // $cnt = count($keywords);
            // echo $cnt . "\n";
           
        ?>                       

        <div style="text-align:center">

            <h1>掲示板 Sample</h1>
            
            <a href="home.php">一覧(新規投稿)</a>❘
            <a href="search_form.php">ワード検索</a>❘
            <a href="">使い方</a>❘
            <a href="">携帯へURLを送る</a>❘
            <a href="">管理</a>
            <p><a href="home.php">掲示板へ戻る</a></p>

            <p>検索語句を入力してください。</p>

            <form class="inline_button" action="search_result.php" method="POST" enctype="multipart/form-data">
                <table border="0" frame="box" rulues="none" border="black" height="120" width="600" align="center">
                    <tr style="text-align:center">
                        <td nowrap>検索語：</td>
                        <td><input type="text" name="keyword" rows="70"></td>
                        <td><input type="radio" name="andor" value="or" checked></td>
                        <td><small>OR</small></td>
                        <td><input type="radio" name="andor" value="and" checked></td>
                        <td><small>AND</small></td>
                    </tr>
                    <th>    
                        <td colspan="2">
                            <input class="radio" type="submit" name="submit" value="検索開始">
                        </td>
                    </th>
                </table> 
               
                   
                <?php 
                    if ($_POST["keyword"]) {   
                        $keyword = $_POST["keyword"];
                        $conects = $db->query($sql);
                        // echo $sql;
                        while($conect = mysqli_fetch_assoc($conects)) { 
                        
                ?>
                
                <table border="0" frame="box" rulues="none" border="black" height="120" width="600" align="center" style="margin-top:20px;">
                    
                    <tr>
                        <td nowrap style="text-align:left">    
                            <?php echo $conect["name"];?> -
                            <?php echo $conect["subject"];?> -
                            <?php echo $conect["url"];?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right">
                            <?php echo date("Y年m月d日H時i分", strtotime($conect['created_at']));?>
                        </td>
                    </tr>
                    <tr style="text-align:left;color:<?php echo $conect["text_color"];?>">
                        <td nowrap>
                            <?php echo $conect["message"];?>
                        </td>
                    </tr>
                    <tr style="text-align:center">
                        <td nowrap>
                            <?php $image_path = $conect["image_path"];?>
                            <img src="<?php echo $image_path;?>" height="250" weight="100">
                        </td>
                    </tr>
                    <br>
                    
                </table>
                <?php 
                        }
                    } 
                ?>
            </form>
        </div>
    </body>
</html>
    