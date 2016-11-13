<?php
    require_once('./require/authorize.php');
?>
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
        <br>
        <br>
        <table class="table table-striped">
            <caption class="sr-only"></caption>
            <colgroup>
                <col width="10%"></col>
                <col width="40%"></col>
                <col width="30%"></col>
                <col width="10%"></col>
                <col width="10%"></col>
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
                    <th>
                        link
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //어플리케이션 상수를 정의
                    require_once('./require/appvars.php');
                    require_once('./require/connectvars.php');

                    $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

                    $query = 'SELECT * FROM test';
                    $data = mysqli_query($dbc,$query);

                    while($row = mysqli_fetch_array($data)){

                        $id = $row['Id'];
                        $email = $row['email'];
                        $pw = $row['pw'];
                        $check = $row['Check'];
                        $attach = $row['attach'];
                        $date = $row['date'];

                        echo "<tr><td>";
                        echo $id."</td><td>";
                        echo $email."</td><td>";
                        echo $pw."</td><td>";
                        echo $check."</td><td>";
                        echo $attach."</td>";
                        echo "</tr>";

                    }


                    mysqli_close($dbc);

                ?>
            </tbody>


        </table>
    </div>
</body>
</html>
