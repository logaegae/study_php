<!DOCTYPE html>
<html>

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
                <col width="10%">
                <col width="25%">
                <col width="25%">
                <col width="25%">
                <col width="15%">
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
                <tr>
                    <?php
                        $dbc = mysqli_connect('localhost','u733252017_logae','a5695938','u733252017_mydb')
                        or die('데이터베이스에 연결이 안되었습니다.');

                        $query = "SELECT * FROM test";
                        $result = mysqli_query($dbc,$query)
                        or die('쿼리 오류');

                        // 레코드 하나씩 호출, while로 반복
                        while($row = mysqli_fetch_array($result)){
                            $id = $row['Id'];
                            $email = $row['email'];
                            $pw = $row['pw'];
                            $check = $row['Check'];
                            $attach = $row['attach'];
                            $date = $row['date'];

                            echo "<tr><td>".$id."</td>"."<td>".$email."</td>"."<td>".$pw."</td>"."<td>".$check."</td><td><button type=".'"button"'." data-toggle=".'"modal"'." data-target=".'"'.'#modal'.$id.'"'." >image</button></td>";
                            echo '<div id="modal'.$id.'" class="modal fade" role="dialog">'.
                                  '<div class="modal-dialog">'.
                                    '<div class="modal-content">'.
                                      '<div class="modal-header">'.
                                        '<button type="button" class="close" data-dismiss="modal">&times;</button>'.
                                        '<h4 class="modal-title">image</h4>'.
                                      '</div>'.
                                      '<div class="modal-body">'.
                                        '<p><img class="modal_image" src="images/'.$attach.'"><br>'.$date.'</p>'.
                                      '</div>'.
                                      '<div class="modal-footer">'.
                                        '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'.
                                      '</div>'.
                                    '</div>'.
                                  '</div>'.
                                '</div>'.
                                '<script>'.
                                    'window.onload=function(){'.
                                    'var image = new Image();'.
                                    'image.onerror = function() {'.
                                    '}'.
                                    'image.src = "images/"'.$attach.';}'.
                                '</script>';
                        }
                        mysqli_close($dbc);
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <a href="index.html" class="btn btn-primary">메인으로</a>
    </div>
    <script type="text/javascript">

        var addr;
        $('img.modal_image').each(function(i,e){
            addr = $(e).attr('src');
            var img = new Image();
            img.src = addr;
            img.onerror = function(){
                $(e).parents('.modal-body').append('<div class="text-center">이미지 없음</div>');
                $(e).remove();

            }

        });

    </script>
</body>
</html>
