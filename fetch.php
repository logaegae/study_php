<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- 부가적인 테마 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
    <h1 class="text-center">DB list</h1>
    <hr>
    <div style="width:50%; margin:20px auto;">
        <table class="table table-striped table-responsive">
            <colgroup>
                <col width="10%">
                <col width="30%">
                <col width="30%">
                <col width="30%">
            </colgroup>
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        email
                    </th>
                    <th>
                        password
                    </th>
                    <th>
                        check
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $dbc = mysqli_connect('localhost','u733252017_logae','a5695938','u733252017_mydb')
                        or die('데이터베이스에 연결이 안되었습니다.');

                        $query = "SELECT * FROM test";
                        $result = mysqli_query($dbc,$query)
                        or die('쿼리 오류');

                        while($row = mysqli_fetch_array($result)){
                            $id = $row['Id'];
                            $email = $row['email'];
                            $pw = $row['pw'];
                            $check = $row['Check'];

                            echo "<tr><td>".$id."</td>"."<td>".$email."</td>"."<td>".$pw."</td>"."<td>".$check."</td></tr>";
                        }
                        mysqli_close($dbc);
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <a href="index.html" class="btn btn-primary">메인으로</a>
    </div>
</body>
</html>
