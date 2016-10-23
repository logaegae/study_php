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
    <div class="container">
        <h1>Report</h1>
        <hr>
        <?php
            $email = $_POST['email'];
            $password = $_POST['pw'];
            $check = $_POST['check'];

            $dbc = mysqli_connect('localhost','u733252017_logae','a5695938','u733252017_mydb')
            or die('데이터베이스에 연결이 안되었습니다.');

            $query ="INSERT INTO test(`email`,`pw`,`Check`)".
            "VALUES('$email','$password','$check')";

            $result = mysqli_query($dbc,$query)
            or die('쿼리 오류');

            mysqli_close($dbc);

            echo 'email = '.$email.'<br>';
            echo 'password = '.$password.'<br>';
            echo 'check = '.$check.'<br>';
        ?>
        <div class="text-center">
            <a href="index.html" class="btn btn-primary">메인으로</a>
        </div>
    </div>
</body>

</html>
