<?php

namespace NDORMS\REDCap;

use NDORMS\REDCap\Nodes\REDCapNode;

/***
 * Class REDCapParser: Pareses a redcap equation OR logic
 */
class REDCapParser
{
    use REDCapParserTrait;

    private $equalityArray = ["=", "!=", "<>", ">=", "<=", ">", "<"];

    public function parse($text)
    {
        $lexer = new REDCapLexer();

        //-- do we have a LHS/RHS


    }

    /***
     * Function to determine if we have a LHS/RHS equation, do not call if an IF is in the function
     * @param $text
     * @return false|int
     */
    public function hasSplitPoint($text) {
        $splitPoint = 0;
        $splitCtr = 0;
        foreach( $this->equalityArray as $splitOn ) {
            $splitPoint = strpos($text, $splitOn);
            if ( $splitPoint > 0 ) {
                $splitCtr++;
            }
        }

        if ( $splitPoint == 0 ) {
            return 0;
        }
        if ( $splitPoint > 0 && $splitCtr == 1) {
            return $splitPoint;
        } else {
            return -1;
        }

    }


}