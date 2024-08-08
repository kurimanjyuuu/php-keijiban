<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf8">
        <title>ワード検索１</title>
    </head>

    <body>
        <div style="text-align:center">
            <h1>掲示板 Sample</h1>
            
            <a href="home.php">一覧(新規投稿)</a>❘
            <a href="search_form.php">ワード検索</a>❘
            <a href="">使い方</a>❘
            <a href="">携帯へURLを送る</a>❘
            <a href="">管理</a></p>
            <a href="home.php">掲示板へ戻る</a>

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
                    <tr>    
                        <td colspan="5">
                            <input class="radio" type="submit" name="submit" value="検索開始">
                            
                        </td>
                    </tr>
                </table>
            </form>


        </div>
    </body>

</html>