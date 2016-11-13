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
    <h1 class="text-center">파일 첨부하기</h1>
    <?php
        if(isset($_POST['submit'])){

            $email = $_POST['email'];
            $password = $_POST['pw'];
            $check = $_POST['check'];

            //$_FILES에 관한 정보들
            $attach = $_FILES['attach']['name'];
            $attachError = $_FILES['attach']['error'];
            $attachType = $_FILES['attach']['type'];
            $attachSize = $_FILES['attach']['size'];
            $fileSize = $_POST['MAX_FILE_SIZE'];

            // 데이터 검증
            if(!empty($email) && !empty($password) && !empty($check) && !empty($attach)){
                if($attachType == 'image/gif' || $attachType == 'image/jpg' || $attachType == 'image/jpeg' || $attachType == 'image/pjpg' || $attachType == 'image/png' && $attachSize > 0 && $attachSize <= $fileSize){
                    if($attachError == 0){
                        //move_uploaded_file() 업로드 파일을 저장폴더로 이동, 저장하는 파일의 이름은 바꿀 수 있다.
                        $target = 'images/'.$attach;
                        if (move_uploaded_file($_FILES['attach']['tmp_name'],$target)) {

                            $dbc = mysqli_connect('localhost','u733252017_logae','a5695938','u733252017_mydb')
                            or die('데이터베이스에 연결이 안되었습니다.');

                            // NOW()를 입력하면 현재시간 반환
                            $query ="INSERT INTO test(`email`,`pw`,`Check`,`attach`,`date`)".
                            "VALUES('$email','$password','$check','$attach',NOW())";

                            $result = mysqli_query($dbc,$query)
                            or die('쿼리 오류');

                            mysqli_close($dbc);
                            ?>
                            <div class="text-center bg-primary">
                                <i class="glyphicon glyphicon-ok pull-left"></i> 정상처리되었습니다.
                            </div>
                            <?php
                            //데이터 비우기
                            $email = '';
                            $password = '';
                            $check = '';
                            $attach = '';
                        }
                    }else{
                        ?>
                        <div class="text-center bg-primary">
                            <i class="glyphicon glyphicon-warning-sign pull-left"></i> 업로드에 문제가 있습니다.
                        </div>
                        <?php
                    }
                }else{
                    //unlink() 임시폴더의 파일 삭제
                    @unlink($_FILES['attach']['tmp_name']);
                    ?>
                    <div class="text-center bg-primary">
                        <i class="glyphicon glyphicon-warning-sign pull-left"></i> 이미지파일이 아니거나 <?php echo ($fileSize / 1024);?>kb보다 큽니다. type:<?php echo $attachType;?>
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="text-center bg-primary">
                    <i class="glyphicon glyphicon-warning-sign pull-left"></i> 입력되지 않은 정보가 있습니다.
                </div>
                <?php
            }
        }
    ?>
    <hr>
    <div class="" style="width:80%;margin:0 auto;">

        <!-- enctype을 이용하여 인코딩 타입 설정 -->
        <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['php_self'];?>">

            <!-- file 사이즈를 제어하기위한 자료값 삽입 -->
            <input type="hidden" name="MAX_FILE_SIZE" value="327680">

            <div class="form-group">
                <label for="exampleInputEmail1">이메일 주소</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="이메일을 입력하세요">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">암호</label>
                <input type="password" name="pw" class="form-control" id="exampleInputPassword1" placeholder="암호">
            </div>
            <div class="checkbox">
                <label for="checkbox">
                    <input type="checkbox" name="check" value="YES" id="checkbox"> 체크확인
                </label>
            </div>
            <input type="file" name="attach">
            <div class="" style="margin-bottom:50px;"></div>
            <button type="submit" class="btn btn-default" name="submit">제출</button>
            <hr>
            <div class="text-center">
                <a href="index.html" class="btn btn-primary">메인으로</a>
            </div>
        </form>
    </div>
</body>
</html>
