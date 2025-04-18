<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>파일첨부하기</title>
</head>
<body>
    <h2>파일첨부하기 - input type='file'</h2>
    <p>php에서 이미지, 텍스트문서, pdf 등 다양한 파일을 첨부하여 서버에 업로드 할 수 있다.</p>
    <p>$_FILES변수 : 첨부한 파일명, 경로, 임시경로, 에러 등의 내용을 가져올 수 있다.</p>
    <pre>
        1. input태그에 name속성을 주고
        input type="file" name ="이름"

        2. php에서 $_FILES변수를 사용하여 해당 값을 가져온다.
        $_FILES['이름']['name']
        $_FILES['이름']['type']
        $_FILES['이름']['tmp_name']
        $_FILES['이름']['error']

        3. 
        $변수명 = $_FILES['이름']['name'];
        echo '$변수명'으로 출력하여 확인

        4. 실제 폴더에 업로드 하기
        move_uploaded_file(임시경로 변수명, 업로드 폴더 변수명, 업로드할 파일 변수명);
    </pre>
</body>
</html>

<?php 

if($_POST['action']=='Upload') {
    //print_r($_FILES['myfile']);
    //echo '<br>';
    //echo $_FILES['myfile']['name'];
    //echo '<br>';
    //echo $_FILES['myfile']['type'];
    //echo '<br>';
    //echo $_FILES['myfile']['size'];
    //echo '<br>';
    //echo $_FILES['myfile']['tmp_name'];
    //echo '<br>';
    //echo $_FILES['myfile']['error'];
}

$uploaded_file_name_tmp = $_FILES['myfile']['tmp_name'];
$uploaded_file_name = $_FILES['myfile']['name'];
$uploaded_folder = './uploads/';

move_uploaded_file($uploaded_file_name_tmp, $uploaded_folder . $uploaded_file_name);

echo '<p>' . $uploaded_file_name . '을(를) 업로드 완료하였습니다. </p>';

?>

<form name="" method="post" action="" enctype="multipart/form-data"> <!--이미지/파일 업로드 할 때 사용-->
    파일업로드 : <input type="file" name="myfile">

    <p>
        <input type="submit" value="파일 업로드" name="action">
    </p>

    <div class>
        <h3>첨부된 이미지 확인</h3>
        <?php 
            $img = $_FILES['myfile']['name'];

            echo "<img src='./uploads/" . htmlspecialchars($img) . "'>" 
        ?>
    </div>

</form>