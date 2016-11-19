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
        <?php
            require_once('./require/connectvars.php');
            require_once('./require/appvars.php');

            $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

            if(isset($_POST['submit'])){
                $username = mysqli_real_escape_string($dbc,trim($_POST['userName']));
                $password = mysqli_real_escape_string($dbc,trim($_POST['password']));
                $re_password = mysqli_real_escape_string($dbc,trim($_POST['re_password']));

                if(!empty($username) && !empty($password) && !empty($re_password)){
                    if($password == $re_password){
                        $query = "SELECT * FROM user WHERE userName = '$username'";
                        $data = mysqli_query($dbc,$query);
                        if(mysqli_num_rows($data) == 0){
                            $query = "INSERT INTO user (userName, password, joinDate) VALUES ('$username',SHA1('$password'),NOW())";
                            mysqli_query($dbc,$query)
                            or die('쿼리 오류');
                            echo '<p class="alert alert-success" role="alert">가입 되었습니다.<br><div class="text-center">'.
                            '<a href="editprofile.php">edit your profile</a></div></p>'.
                            '<div class="text-center"><a href="index.html" class="btn btn-primary">메인으로</a></div>';
                            exit();
                        }else{
                            echo '<p class="alert alert-warning" role="alert">이미 중복된 아이디가 있습니다.</p>';
                        }
                    }else{
                        echo '<p class="alert alert-warning" role="alert">비밀번호를 다시 확인해 주세요.</p>';
                    }
                }else{
                    echo '<p class="alert alert-warning" role="alert">정보를 모두 입력해야 합니다.</p>';
                }
            }
            mysqli_close($dbc);
        ?>
        <h1 class="text-center">회원가입</h1>
        <hr>
        <form class="form-group" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <legend class='sr-only'>회원가입정보</legend>
                <label for="name">아이디</label>
                <input type="text" class="form-control" name="userName" id="name" value="<?php if(!empty($username)) echo $username;?>" required/><br/>
                <label for="password">비밀번호</label>
                <input type="password" class="form-control" name="password" id="password" required/><br/>
                <label for="re_password">비밀번호 확인</label>
                <input type="password" class="form-control" name="re_password" id="re_password" required/><br/>
            </fieldset>
            <div class="text-center">
                <input type="submit" name="submit" value="가입하기">
            </div>
        </form>
        <hr>
        <div class="text-center">
            <a href="index.html" class="btn btn-primary">메인으로</a>
        </div>
    </div>
</body>
</html>
