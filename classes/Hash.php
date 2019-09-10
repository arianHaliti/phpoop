<?php

   class Hash {
      public static function make ($str , $salt){
         return hash('sha256', $str . $salt);
      }
      public static function salt ($length){
         return random_bytes($length);
      }
   }

?>