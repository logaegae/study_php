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
        <form class="form-group" action="<?php echo $_SERVER['php_self'];?>" method="post">
            <fieldset>
                <legend class="sr-only">QUERY</legend>
                <label for="text">QUERY</label>
                <textarea class="form-control" rows="5" id="text" name="text"></textarea>
            </fieldset>
            <br>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" name="submit" value="제출하기">
                <input class="btn" type="reset" value="삭제">
            </div>
            <br>
        </form>
            <?php
                require_once('./require/connectvars.php');
                if(isset($_POST['submit'])){
                    $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                    $text = mysqli_real_escape_string($dbc, trim($_POST['text']));
                    echo '<textarea class="form-control" rows="5" id="text" name="text" readonly>'.$text.'</textarea>';
                };
            ?>
        <div class="text-center">
            <br>
            <a href="index.html" class="btn btn-primary">메인으로</a>
        </div>
    </div>
</body>
</html>
