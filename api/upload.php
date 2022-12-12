<?php
include_once "base.php";

if($_FILES['file_name']['error']==0){
    //因為array_pop裡面只能放變數,因此要先將explode炸開的結果存成變數, 再放進array_pop
    //不能直接放explode(".",$_FILES['file_name']['name'])
    $file_str_array=explode(".",$_FILES['file_name']['name']);
    //拿到上傳檔案的副檔名
    $sub=array_pop($file_str_array);
    //以下為了將上傳的檔案變成我想要的檔名, 再存進來. move_uploaded_file本來打的$_FILES['file_name']['name']
    //要記得改成$file_name
    $file_name=date("YMDhis").".".$sub;

    move_uploaded_file($_FILES['file_name']['tmp_name'],"../upload/".$file_name);
    insert('upload',['description'=>$_POST['description'],
                    'size'=>$_FILES['file_name']['size'],
                    'type'=>$_FILES['file_name']['type'],
                    'file_name'=>$file_name     
]);
    // $description=$_POST['description'];
    // echo $description;
    // echo "<br>";
    // echo $file_name;
    // echo "<br>";
    // echo $_FILES['file_name']['size'];
    // echo "<br>";
    //以下type的說明可以查詢MIME TYPE
    // echo $_FILES['file_name']['type'];
    header("location:../upload.php?upload=success");
}else{
    echo "上傳失敗!";
}
