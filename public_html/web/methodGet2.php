<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- 부가적인 테마 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
    <br><br><br>
    <div class="container">
        <table class="table table-hover">
            <caption class="sr-only"></caption>
            <colgroup>
                <col width="10%">
                <col width="45%">
                <col width="45%">
            </colgroup>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>EMAIL</th>
                    <th>PW</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    echo '<tr><td>'.$_GET['Id'].'</td>';
                    echo '<td>'.$_GET['email'].'</td>';
                    echo '<td>'.$_GET['pw'].'</td></tr>';
                ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="index.html" class="btn btn-primary">메인으로</a>
        </div>
    </div>
</body>
</html>
