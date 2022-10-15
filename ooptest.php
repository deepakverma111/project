///Namespace
<?php
namespace HTML;
class Table{
  public  $title="";
   public $numrows=0;
   public function message(){
    echo "Title of the table is {$this->title} and total number of rows are {$this->numrows}";
   }
}
$table=new Table();
$table->title="Info Table ";
$table->numrows=5;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oop test</title>
</head>
<body>
    <?php
    interface human{
        public function gender();
    }
    class male implements human {
    public function gender(){
        echo "Male <br>";
    }
    }
    class female implements human {
        public function gender(){
            echo "Female";
        }
    }
    $male=new male();
    $female=new female();
    $human=array($male,$female);
    foreach($human as $human) {
        $human->gender();
    }

    ?>
    <br>
    <?php
    trait msg {
       public function msg1() {
            echo "My name is Deepak Verma <br>";
       } 
    }
    class name{
        use msg;
    }
    $obj=new name();
    $obj->msg1();

    ?>
    <br>
    <?php
    class intro{
        public static function qualification(){
            echo "My qualification is 12th class <br>";
        }
    }
    intro::qualification();
    ?>
    <?php
    $table->message();
    ?>

    
</body>
</html>