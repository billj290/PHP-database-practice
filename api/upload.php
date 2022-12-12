<?php

if($_FILES['file_mame']['error']==0){
    move_uploaded_file($_FILES['file_name']['tmp_name'],"../upload/".$_FILES['file_name']['name']);
    header("location:../upload.php?upload=success");
}else{
    echo "上傳失敗!";
}

?>