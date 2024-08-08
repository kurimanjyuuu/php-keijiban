<!DOCTYPE html>
    <head>
        <meta charaset="utf-8">
        <title>選手データ入力</title>
    </head>
    <body>
        <table border="1">
            <form action="confirm.php" method="POST">
            <tr>
                <th>選手ID</th>
                <td>自動発番</td>
            </tr>
            <tr>
                <th><label for="onamae">選手名</label></th>
                <td><input type="text" name="onamae"></td>
            </tr>

            <tr>
                <th><label for="number">国ID</label></th>
                <td><input type="text" name="country_id"></td>
            </tr>
            <tr>
                <th><label for="uniform_num">背番号</label></th>
                <td><input type="number" name="uniform_num"></td>
            </tr>
            <tr>
                <th><label for="text">ポジション</label></th>
                <td><input type="text" name="position"></td>
            </tr>
            <tr>
                <th><label for="club">所属クラブ</label></th>
                <td><input type="text" name="club"></td>
            </tr>
            <tr>
                <th><label for="birth">誕生日</label></th>
                <td><input type="date" name="birth"></td>
            </tr>
                <th><label for="height"></label>身長</th>
                <td><input type="text" name="height"></td>
            </tr>
            <tr>
                <th><label for="weight"></label>体重</th>
                <td><input type="text" name="weight"></td>
            </tr>
            <tr>
                <td><input type="submit" value="送信"></td>
            </tr> 
            </form>
            </section>
        </table>
    </body>
</html>




