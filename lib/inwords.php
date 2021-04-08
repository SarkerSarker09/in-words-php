<?php 
namespace lib;

class InWords {

    public static function convertNumberToInWords($number) 
    { 
        if (($number < 0) || ($number > 999999999))
        { 
            throw new Exception("Your Number is out of range");
        } 

        $crore = floor($number / 10000000);     // Crore 
        $number -= $crore * 10000000;

        $lakh = floor($number / 100000);        // lakh
        $number -= $lakh * 100000; 

        $thousand = floor($number / 1000);     // Thousand 
        $number -= $thousand * 1000; 

        $hundred = floor($number / 100);      // Hundred  
        $number -= $hundred * 100; 

        $ten = floor($number / 10);          // Ten 
        $n = $number % 10;                   // One or single digit
    
        $inWords = ""; 
    
        if ($crore) 
        { 
            $inWords .= self::convertNumberToInWords($crore) . " Crore "; 
        } 

        if ($lakh) 
        { 
            $inWords .= self::convertNumberToInWords($lakh) . " Lakh"; 
        } 
    
        if ($thousand) 
        { 
            $inWords .= (empty($inWords) ? "" : " ") . self::convertNumberToInWords($thousand) . " Thousand"; 
        } 
    
        if ($hundred) 
        { 
            $inWords .= (empty($inWords) ? "" : " ") . self::convertNumberToInWords($hundred) . " Hundred"; 
        } 
    
        // 1 upto 19 in word        
        $oneUpToNineteen = ["", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen"]; 

        //  20 upto 90 in word        
        $twentyUpToNinety = ["", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety"]; 
    
        if ($ten || $n) 
        { 
            if (!empty($inWords)) 
            { 
                $inWords .= " and "; 
            } 
    
            if ($ten < 2) 
            { 
                $inWords .= $oneUpToNineteen[$ten * 10 + $n]; 
            } 
            else 
            { 
                $inWords .= $twentyUpToNinety[$ten]; 
    
                if ($n) 
                { 
                    $inWords .= "-" . $oneUpToNineteen[$n]; 
                } 
            } 
        } 
    
        if (empty($inWords)) 
        { 
            $inWords = "zero"; 
        } 
    
        return $inWords; 
    } 
}

?>