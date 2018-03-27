<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
        $title = "ahmad site";
    ?>

    <h1><?php echo $title ?></h1>

    <h2>Php Functions <h2>

    <?php
      function say_it(){
        echo "I am learning PHP" . "<br>";
      }
      say_it();

    /*** functions with parameters ***/
        function addNumbers($val1, $val2){
            return $val1 + $val2;
        }

       $sum = addNumbers(22, 11);
        echo $sum . "<br>";

       $sum = 2 * $sum;
       echo $sum . "<br>"; 
    ?>

    <h2>Global and local variables</h2>
    <?php 
        $x = "I am outside the scope";
        function convert(){
            global $x;
           echo $x = "I am inside" . "<br>";
        }
        echo $x . "<br>";
        convert();
        echo $x . "<br>";
    ?>

    <h2>Constants</h2>
    <?php 
        define("NAME", Ahmad);
        echo NAME;
    ?>

</body>
</html>