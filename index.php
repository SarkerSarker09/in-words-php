
<?php 
require 'vendor/autoload.php';

use lib\InWords;



$num = 8569435;
// $inWords = new InWords();
try
{
    echo $num ." = ". InWords::convertNumberToInWords($num) . " Only";
}
catch(Exception $e)
{
    echo $e->getMessage();
}

?>
