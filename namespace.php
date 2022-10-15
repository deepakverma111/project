<?php
namespace HTML;
class Table{
   public $title="";
   public $numrows=0;
   public function message(){
    echo "Table title name is {$this->title} and the number of row are {$this->numrows}<br>";
   }
}
$table=new Table();
$table->title="My table";
$table->numrows=10;
$table->message();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>namespace</title>
    <style>
        h1{
            text-align:center;
        }
        p{
            text-align:center;
        }
        </style>
</head>
<body>
    <h1>Table information by namespace </h1>
    <?php
    $table->message() ; 
   
    ?>
    <?php
    function printalphabet(iterable $alphabet){
        foreach($alphabet as $char){
            echo $char;
        }
    }
    
    $arr=["a","b","c"];
    printalphabet($arr);
    
    ?>

    
</body>
</html>