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
        <h1>php_self</h1>

        <?php
            $dbc = mysqli_connect('localhost','u733252017_logae','a5695938','u733252017_mydb')
            or die('데이터베이스에 연결이 안되었습니다.');

            if(isset($_POST['submit'])){
                if(isset($_POST['todelete'])){
                    foreach($_POST['todelete'] as $delete_id){

                        $query = "DELETE FROM test WHERE Id = $delete_id";
                        mysqli_query($dbc,$query)
                        or die('쿼리 오류');

                    }
                    ?>
                    <div class="text-center bg-primary">
                        <i class="glyphicon glyphicon-ok pull-left"></i> 정상처리되었습니다.
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="text-center bg-warning">
                        <i class="glyphicon glyphicon-warning-sign pul-left"></i> 선택된 것이 없습니다.
                    </div>
                    <?php
                }
            }
        ?>
        <hr>
        <form class="form-group" action="<?php echo $_SERVER['php_self'];?>" method="post">
            <?php
                $query = "SELECT * FROM test"
                or die('쿼리 오류');
                $result = mysqli_query($dbc,$query);

                while($row = mysqli_fetch_array($result)){
                    echo '<label for="'.'a'.$row['Id'].'"><input class="" type="checkbox" value="'.$row['Id'].'" name="todelete[]" id="'.'a'.$row['Id'].'" />&nbsp;';
                    echo $row['email'].'&nbsp;&nbsp;&nbsp;';
                    echo $row['pw'].'&nbsp;&nbsp;&nbsp;';
                    echo 'check? :'.$row['Check'].'</label><br/>';
                }
                mysqli_close($dbc);
            ?>
            <div class="text-center">
                <input type="submit" name="submit" value="삭제">
            </div>
        </form>
        <div class="text-center">
            <a href="index.html" class="btn btn-primary">메인으로</a>
        </div>
    </div>
</body>

</html>
