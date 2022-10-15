<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload </title>
</head>
<body>

    <?php
    $myfile=fopen("file/name.txt","r");
    echo fgets($myfile);
    fclose($myfile);
    ?>
    <?php
    $f1=fopen("file/name.txt","r") or die("Unable to read file");
    while(!feof($f1)){
        echo fgetc($f1)."--<br>";
    }
    fclose($f1);

    
    
    
    $file="file";
    if(is_dir($file)) {
        echo ("$file is a directory");
      } else {
        echo ("$file is not a directory");
      }
    ?>
    
</body>
</html>