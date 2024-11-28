<?php

if(isset($_POST['img'])){

if($_FILES['img']['error']==4){
    echo "Files required";
}else{
    $imgName=$_FILES['img']['name'];
    $imgTmp=$_FILES['img']['tmp_name'];
    $imgSize=$_FILES['img']['size'];

    $validExtension=['jpg','png','jpeg'];
    $imgExtension=explode('.',$imgName);
    $imgExtension=end($imgExtension);


    if(!in_array($imgExtension,$validExtension)){
        echo "invalid file extension";
    }else if($imgSize>1000000){
        echo "image too large";
    }else{
        $newImageName=uniqid();
        $newImageName.='.'.$imgExtension;

        echo $newImageName;
    }

}

}