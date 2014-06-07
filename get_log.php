<?php
if(file_exists($_POST['filename'])){
    $filedata = file_get_contents($_POST['filename']);
    echo $filedata;
}else{
    echo "False";
}
