<?php
    function eregi($needle, $haystack, &$matches = null) {
       $needle = "/$needle/";
       return preg_match_all($needle, $haystack, $matches);
   }

    function split($needle, $haystack) {
       $str = "/" .  str_replace("/", "\/", $needle) . "/";
       return preg_split($str, $haystack);
   }
   
  
    function explodeEscaped($delimiter, $str, $escapeChar = '\\') {
        //Just some random placeholders that won't ever appear in the source $str

        $double = "\0\0\0_double";
        $escaped = "\0\0\0_escape";

        echo "BEFORE: ", print_r($str, true);
        $str = str_replace($escapeChar . $escapeChar, $double, $str);

        $str = str_replace($escapeChar . $delimiter, $escaped, $str);

        $split = explode($delimiter, $str);

        foreach ($split as &$val)
            $val = str_replace([$double, $escaped], [$escapeChar, $delimiter], $val);

        return $split;
    }

    // $foo = str_replace(',', '\,', $foo);
    // echo "<br>FINAL: " . print_r(explodeEscaped(',', $foo, '\\'), true);
?>
