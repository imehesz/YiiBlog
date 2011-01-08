<?php
    /**
     * some simple functions that helps the developer life
     */
    class MUtility
    {
        /**
         * returns a well formatted string that can be useful for
         * URL-s username etc ...
         *
         * @param $str string
         * @return string
         */
        public static function strToPretty( $str )
        {
            $retval = strtolower( $str );
            return trim(preg_replace(array('/[^a-z0-9-]/', '/-+/'), array('-','-'), $retval), '-');
        }
    }
?>
