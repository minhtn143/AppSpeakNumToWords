<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
    <style>
        input[type=number] {
            width: 300px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 4px;
            padding: 12px 10px 12px 10px;
        }

        #submit {
            border-radius: 2px;
            padding: 10px 32px;
            font-size: 16px;
        }
    </style>
</head>
<body>
<h2>Application: Speak Number to Words</h2>
<form method="GET">
    <input type="number" name="numberInput" placeholder="Enter number:"/>
    <input type="submit" id="submit" value="SPEAK" onfocus=""/>
</form>

<?php
$convertString = "";
function speakWords()
{
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $numberInput = $_GET["numberInput"];
        if ($numberInput < 0 || $numberInput >= 1000) {
            $convertString = "OUT OF ABILITY";
            echo $convertString;
        }
        /*else {
            if ($numberInput < 10) {
                $convertString = count0to9($numberInput);
                return $convertString;
            } else {
                if ($numberInput < 20) {
                    $convertString = count10to19($numberInput);
                    return $convertString;
                }
                if ($numberInput <100){
                    if ($numberInput%10==0){
                        $convertString = countTens($numberInput);
                        return $convertString;
                    }else{
                        $convertString = countTens($numberInput)." ".count0to9($numberInput%10);
                        return $convertString;
                    }
                }
                if ($numberInput%100==0){
                    $convertString = count0to9(floor($numberInput/100))." Hundred";
                    return $convertString;
                }
                else{
                    $convertString = count0to9(floor($numberInput/100))." Hundred ". countTens($numberInput%100)
                        ." ". count0to9($numberInput%100%10);
                    return $convertString;
                }

            }
        }*/
        switch (true) {
            case $numberInput < 10:
                $convertString = count0to9($numberInput);
                return $convertString;
            case $numberInput < 20:
                $convertString = count10to19($numberInput);
                return $convertString;
            case $numberInput < 100:
                if ($numberInput % 10 == 0) {
                    $convertString = countTens($numberInput);
                    return $convertString;
                } else {
                    $convertString = countTens($numberInput) . " " . count0to9($numberInput % 10);
                    return $convertString;
                };
            case $numberInput % 100 == 0:
                $convertString = count0to9(floor($numberInput / 100)) . " Hundred";
                return $convertString;
            default:
                $convertString = count0to9(floor($numberInput / 100)) . " Hundred " . countTens($numberInput % 100)
                    . " " . count0to9($numberInput % 100 % 10);
                return $convertString;
        }
    }
}

echo speakWords();


function count0to9($number)
{
    $result = "";

    switch ($number) {
        case 0:
            $result = "Zero";
            return $result;
        case 1:
            $result = "One";
            return $result;
        case 2:
            $result = "Two";
            return $result;
        case 3:
            $result = "Three";
            return $result;
        case 4:
            $result = "Four";
            return $result;
        case 5:
            $result = "Five";
            return $result;
        case 6:
            $result = "Six";
            return $result;
        case 7:
            $result = "Seven";
            return $result;
        case 8:
            $result = "Eight";
            return $result;
        case 9:
            $result = "Nine";
            return $result;
    }
}

function count10to19($number)
{
    $result = "";
    $ones = $number % 10;
    switch ($ones) {
        case 0:
            $result = "Ten";
            return $result;
        case 1:
            $result = "Eleven";
            return $result;
        case 2:
            $result = "Twelve";
            return $result;
        case 3:
            $result = "Thirteen";
            return $result;
        case 4:
            $result = "Fourteen";
            return $result;
        case 5:
            $result = "Fifteen";
            return $result;
        default:
            $result = count0to9($ones) . "teen";
            return $result;
    }
}

function countTens($number)
{
    $result = "";
    $tens = floor($number / 10);
    switch ($tens) {
        case 2:
            $result = "Twenty";
            return $result;
        case 3:
            $result = "Thirty";
            return $result;
        case 4:
            $result = "Forty";
            return $result;
        case 5:
            $result = "Fifty";
            return $result;
        default:
            $result = count0to9($tens) . "ty";
            return $result;
    }
}

?>
</body>
</html>