<?php
/***
 * @package      replicate
 * @author       Duncan Appelbe
 * @copyright    2021 Duncan Appelbe
 * @license      https://opensource.org/licenses/MIT
 */

namespace NDORMS\REDCap;

/***
 * Class REDCapLexer  : A simple lexer
 * @namespace NDORMS\REDCap
 */
class REDCapLexer
{
    /***
     * Function: stripTabsAndBreaks
     *           Remove and Line breaks, Tabs and leading/trailing spaces from the input string.
     *
     * @param string $inStr The string to be operated on
     * @return string       The result from the operation, if the input variable is not a string then return an empty string
     */
    public function stripTabsAndBreaks( $inStr) : string {
        if ( is_string( $inStr ) ) {
            return trim(str_replace(array("\r\n", "\n", "\r", "\t"), array(" ", " ", " ", " "), $inStr));
        }
        return "";
    }
}