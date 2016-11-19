<!DOCTYPE html>
<html>
<?php
    require_once('./require/authorize.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- 부가적인 테마 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <style>
        .modal-body img{
            width:100%;
        }
    </style>
</head>
<body>
    <h1 class="text-center">DB list</h1>
    <hr>
    <div style="width:50%; margin:20px auto;">
        <table class="table table-striped table-responsive">
            <colgroup>
                <col width="30%">
                <col width="25%">
                <col width="25%">
                <col width="20%">
            </colgroup>
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        password
                    </th>
                    <th>
                        join date
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once('./require/connectvars.php');
                    $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
                    or die('데이터베이스에 연결이 안되었습니다.');

                    if(isset($_GET['userName'])){
                        $target = $_GET['userName'];
                        $query = "DELETE FROM user WHERE userName = '$target'";
                        mysqli_query($dbc,$query)
                        or die('쿼리 오류1');
                    }
                    $query = "SELECT userName, password, joinDate FROM user";
                    $result = mysqli_query($dbc,$query)
                    or die('쿼리 오류');

                    // 레코드 하나씩 호출, while로 반복
                    while($row = mysqli_fetch_array($result)){
                        $userName = $row['userName'];
                        $password = $row['password'];
                        $joinDate = $row['joinDate'];

                        echo "<tr><td>".$userName."</td>"."<td>".$password."</td>"."<td>".$joinDate.'</td><td><a href="memberslist.php?userName='.$userName.'">remove</a></td></tr>';
                    }
                    mysqli_close($dbc);
                ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <a href="index.html" class="btn btn-primary">메인으로</a>
    </div>
</body>
</html>
