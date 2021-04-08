
<?php 
require 'vendor/autoload.php';

use lib\InWords;


echo "index";
$num = 8569435;
$inWords = new InWords();
try
{
    echo $num ." = ". $inWords->convertNumberToInWords($num) . " Only";
}
catch(Exception $e)
{
    echo $e->getMessage();
}

?>
