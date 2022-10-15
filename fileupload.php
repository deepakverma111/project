<?php
if(isset($_FILES['']) && !empty($_FILES[''][''])>0){
    $x=explode(".",$_FILES['']['']);
    $y=end($x);
    $z="new file name".date(ydmis).rand().$y;
    if(move_uploaded_file(['file name']['temp_name']."folder name".$z)){
echo "your file moved successfully";
    }
}
?>
<enctype="multipart/form-data">