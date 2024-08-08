<!DOCTYPE html>
    <head>
        <meta charaset="utf-8">
        <title>MySQL課題2</title>
    </head>

    <body>
        <?php
            //ポジションごとに選手名
            $positions = ['FW', 'MF', 'DF', 'GK'];
            $i = 0;
            $count = count($positions);
                    while($i < $count){
                        echo $i;
                        echo $count; //4
                        
                        // var_dump();
        ?> 
            <h2><?php echo $positions[$i];?></h2>
           
        <?php  
            $link = mysqli_connect('db','root','root','db');
            // 接続状況をチェックする。
            if (mysqli_connect_errno()) {
                die("データベースに接続できません:" . mysqli_connect_error() . "\n") ;

            } else {
                echo "データベースの接続に成功しました。\n" ;
            } 
            //クエリを実行する。
            $result = mysqli_query($link, " SELECT * FROM players WHERE position ='FW';");


            while($row = mysqli_fetch_assoc($result)){
                
                echo $row['name'];

            
            

            echo $i++;  
                }
            }
                
        ?>
            
            
            
            
          
        
        <h2>FW</h2>
        -osako
        -honda
        -okazaki

        <h2>MF</h2>
        -endo
        -hasebe

        <h2>DF</h2>
        -...
        -...
        -...

        <h2>GK</h2>
        -...
        -...
        -...

        <?php 
        $i = 1; // 2 3 4 
        $num =0; // 3 6 10

        while ($i<5){
            $num = $num + $i; //$num 10
            $i = $i + 1; // $i 5
        }
        
        echo $num; 
        
        
        
        ?>
   




        <?php
            $link = mysqli_connect('db','root','root','db');
            // 接続状況をチェックする。
            if (mysqli_connect_errno()) {
                die("データベースに接続できません:" . mysqli_connect_error() . "\n") ;

            } else {
                echo "データベースの接続に成功しました。\n" ;
            }

            //DB接続完了中
            mysqli_select_db($link, "db");

            //クエリを実行する。
            $result = mysqli_query($link, "SELECT * FROM players;")
               

            
        ?>

        <table border="1">
            <tr>
                <th>選手ID</th>
                <th>選手名</th>
                <th>国ID</th>
                <th>背番号</th>
                <th>ポジション</th>
                <th>所属クラブ</th>
                <th>誕生日</th>
                <th>身長</th>
                <th>体重</th>
            </tr>

            <?php

            while($row = mysqli_fetch_assoc($result)) {

            ?>
    
            <tr>
                <td><?php echo $row["id"];?></td>
                <td><?php echo $row["country_id"];?></td>
                <td><?php echo $row["uniform_num"];?></td>
                <td><?php echo $row["position"];?></td>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $row["club"];?></td>
                <td><?php echo $row["birth"];?></td>
                <td><?php echo $row["height"];?></td>
                <td><?php echo $row["weight"];?></td>
                <td><?php echo "<hr />";?></td>
            </tr>       
            <?php } ?>
            
        </table>

        <?php 
        $i = 1; // 2 3 4 
        $num =0; // 3 6 10

        while ($i<5){
            $num = $num + $i; //$num 10
            $i = $i + 1; // $i 5
        }
        
        echo $num; 
        
        
        
        ?>
   






        <p><a href="insert.php">選手を追加する</a></p>
    </body>
</html>