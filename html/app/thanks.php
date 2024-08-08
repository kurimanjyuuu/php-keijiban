<!DOCTYPE html>
    <html lang="ja"></html>
    <head>
        <mata charset="utf-8">
        <title>完了画面</title>
    </head>
    <body>
        <h2>登録完了</h2>

        <form action="./thanks.php" method="POST">

        <?php

        if($_SERVER["REQUEST_METHOD"]=="POST") {

            $name=$_POST["name"];
            $country_id=$_POST["country_id"];
            $uniform_num=$_POST["uniform_num"];
            $position=$_POST["position"];  
            $club=$_POST["club"];
            $birth=$_POST["birth"];
            $height=$_POST["height"];
            $weight=$_POST["weight"];

        }

        if(isset($_POST)) {

            $name=$_POST["name"];
            $country_id=$_POST["country_id"];
            $uniform_num=$_POST["uniform_num"];
            $position=$_POST["position"]; 
            $club=$_POST["club"];
            $birth=$_POST["birth"];
            $height=$_POST["height"];
            $weight=$_POST["weight"];

        }
        
        ?>

            <table border="1">

                <tr>
                    <th>選手名</th>
                    <td><?php echo $_POST["name"];?></td>
                </tr>
                <tr>
                    <th>国ID</th>
                    <td><?php echo $_POST["country_id"];?></td>
                </tr>
                <tr>
                    <th>背番号</th>
                    <td><?php echo $_POST["uniform_num"];?></td>
                </tr>
                <tr>
                    <th>ポジション</th>
                    <td><?php echo $_POST["position"];?></td>
                </tr>
                <tr>
                    <th>所属クラブ</th>
                    <td><?php echo $_POST["club"];?></td>
                </tr>
                <tr>
                    <th>誕生日</th>
                    <td><?php echo $_POST["birth"];?></td>
                </tr>
                <tr>
                    <th>身長</th>
                    <td><?php echo $_POST["height"];?></td>
                </tr>
                <tr>
                    <th>体重</th>
                    <td><?php echo $_POST["weight"];?></td>
                </tr>
                <tr>
                <p><a href="insert.php">戻る</a></p>
                <p><a href="show.php">一覧はこちら</a></p>
                </tr>
            </table>  
        </form>
    </body>
</html>