<!DOCTYPE html>
<html lang="ja"></html>
    <head>
        <meta charset="utf-8">
        <title>確認画面</title>
    </head>
    <body>
        <?php
        $name=$_POST["onamae"];
        $country_id=$_POST["country_id"];
        $uniform_num=$_POST["uniform_num"];
        $position=$_POST["position"];
        $club=$_POST["club"];
        $birth=$_POST["birth"];
        $height=$_POST["height"];
        $weight=$_POST["weight"];

        $link = mysqli_connect('db','root','root','db');
        if (mysqli_connect_errno()) {
            die("データベースに接続できません:" . mysqli_connect_error() . "\n") ;

        } else {
            echo "データベースの接続に成功しました。\n" ;
        }

        //DB接続完了中
        mysqli_select_db($link, "db");

        //クエリを実行する。
        $query ="INSERT INTO players (country_id, uniform_num, position, name, club, birth, height, weight) VALUE ('$country_id', '$uniform_num', '$position', '$name','$club', '$birth', '$height', $weight)";

        if (mysqli_query($link, $query)) {
            echo "INSERT に成功しました。\n";
        } else {
            die('クエリーが失敗しました。' . mysqli_error($link) . "\n");
        }
        mysqli_close($link);
        
        ?>  

        <h2>登録内容</h2>
        <form action="./thanks.php" method=POST>
            <table border="1">
                <tr>
                    <th>選手名</th>
                    <input type="hidden" name="name" value="<?php echo $_POST["onamae"];?>">
                    <td><?php echo $name;?></td>
                </tr>
                <tr>
                    <th>国ID</th>
                    <input type="hidden" name="country_id" value="<?php echo $_POST["country_id"];?>">
                    <td><?php echo $country_id;?></td>
                </tr>
                <tr>
                    <th>背番号</th>
                    <input type="hidden" name="uniform_num" value="<?php echo $_POST["uniform_num"];?>">
                    <td><?php echo $uniform_num;?></td>
                </tr>
                <tr>
                    <th>ポジション</th>
                    <input type="hidden" name="position" value="<?php echo $_POST["position"];?>">
                    <td><?php echo $position;?></td>
                </tr>
                <tr>
                    <th>所属クラブ</th>
                    <input type="hidden" name="club" value="<?php echo $_POST["club"];?>">
                    <td><?php echo $club;?></td>
                </tr><tr>
                    <th>誕生日</th>
                    <input type="hidden" name="birth" value="<?php echo $_POST["birth"];?>">
                    <td><?php echo $birth;?></td>
                </tr>
                <tr>
                    <th>身長</th>
                    <input type="hidden" name="height" value="<?php echo $_POST["height"];?>">
                    <td><?php echo $height;?></td>
                </tr>
                <tr>
                    <th>体重</th>
                    <input type="hidden" name="weight" value="<?php echo $_POST["weight"];?>">
                    <td><?php echo $weight;?></td>
                </tr>
                <tr>
                    <td><input type="submit" value="送信"></td>
                </tr>

            </table>  
        </form>
    </body>
</html>