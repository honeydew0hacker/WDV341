<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basics Assignment</title>
</head>

<body>
    <h1>PHP Basics</h1>
    <?php
    $yourname = "Pamela";
    echo ("<h2>My name is</h2>" . $yourname . "<br><h2>Nice to be back</h2><br>");

    $number1 = 10;
    $number2 = 10;


    function addNumbers($number1, $number2)
    {
        $total = $number1 + $number2;
        return $total;
    }
    echo addNumbers($number1, $number2);

    echo ("<br>");

    $codes = ["PHP", "HTML", "Javascript"];
    $arrayLength = count($codes);


    for ($i = 0; $i < $arrayLength; $i++) {
        echo $i . ":" . $codes[$i] . "<br>";
    }

    ?>


</body>

</html>