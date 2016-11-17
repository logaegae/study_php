<?php
    require_once('./require/connectvars.php');
    if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])){
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="example"');
        exit('<h2>로그인 해야만 볼 수 있습니다.</h2>');
    }
    $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    $input_username = mysqli_real_escape_string($dbc, trim($_SERVER['PHP_AUTH_USER']));
    $input_password = mysqli_real_escape_string($dbc, trim($_SERVER['PHP_AUTH_PW']));

    $query = "SELECT userId, userName FROM user WHERE userName = '$input_username' AND password = SHA1('$input_password')";
    $data = mysqli_query($dbc,$query);

    if(mysqli_num_rows($data) == 1){
        $row = mysqli_fetch_array($data);
        $userId = $row['userId'];
        $userName = $row['userName'];
    }else {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="example"');
        exit('<h2>로그인 해야만 볼 수 있습니다.</h2>');
    }
    echo('<h2>로그인 되었습니다.</h2>');
    mysqli_close($dbc);
?>
