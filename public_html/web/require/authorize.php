<?php
    $username = "logaegae";
    $password = "123qweasd";

    if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)){
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate:Basic realm="okok"');
        exit('<h2 class="text-center">인증 실패</h2><p>이 페이지는 인증이 필요합니다.</p>');
    }
?>
