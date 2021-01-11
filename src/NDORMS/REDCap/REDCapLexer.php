<?php
/***
 * @package      replicate
 * @author       Duncan Appelbe
 * @copyright    2021 Duncan Appelbe
 * @license      https://opensource.org/licenses/MIT
 */

namespace NDORMS\REDCap;

use MathParser\Lexing\Lexer;
use MathParser\Lexing\TokenDefinition;

/***
 * Class REDCapLexer  : A simple lexer
 * @namespace NDORMS\REDCap
 */
class REDCapLexer extends Lexer
{

    public function __construct()
    {
        $this->add(new TokenDefinition('/^[-+]?\d*$/', REDCapTokenType::Integer));

        $this->add(new TokenDefinition('/if/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/datediff/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/min/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/max/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/log/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/sum/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/round/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/roundup/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/rounddown/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/sqrt/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/abs/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/sum/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/mean/', REDCapTokenType::FunctionName));
        $this->add(new TokenDefinition('/median/', REDCapTokenType::FunctionName));

        $this->add(new TokenDefinition('/\(/', REDCapTokenType::OpenParenthesis));
        $this->add(new TokenDefinition('/\)/', REDCapTokenType::CloseParenthesis));
        $this->add(new TokenDefinition('/(,)/', REDCapTokenType::CommaSeperator));

        $this->add(new TokenDefinition('/and/', REDCapTokenType::LogicalAND));
        $this->add(new TokenDefinition('/or/', REDCapTokenType::LogicalOR));
        $this->add(new TokenDefinition('/\+/', REDCapTokenType::AdditionOperator));
        $this->add(new TokenDefinition('/\-/', REDCapTokenType::SubtractionOperator));
        $this->add(new TokenDefinition('/\*/', REDCapTokenType::MultiplicationOperator));
        $this->add(new TokenDefinition('/\//', REDCapTokenType::DivisionOperator));
        $this->add(new TokenDefinition('/\^/', REDCapTokenType::ExponentiationOperator));
        $this->add(new TokenDefinition('/(>=)/', REDCapTokenType::GreaterThanOrEquals));
        $this->add(new TokenDefinition('/(>)/', REDCapTokenType::GreaterThan));
        $this->add(new TokenDefinition('/(<=)/', REDCapTokenType::LessThanOrEquals));
        $this->add(new TokenDefinition('/(<)/', REDCapTokenType::LessThan));
        $this->add(new TokenDefinition('/(!=)/', REDCapTokenType::NotEqualTo));
        $this->add(new TokenDefinition('/(=)/', REDCapTokenType::EqualTo));

        $this->add(new TokenDefinition('/\[[a-z_0-9]*\]\[[a-z_0-9]*\]/', REDCapTokenType::Identifier));
        $this->add(new TokenDefinition('/\[[a-z_0-9]*\]/', REDCapTokenType::Identifier));
        $this->add(new TokenDefinition('/\[[a-z_0-9]*\]\[[a-z_0-9]*\(\d*\)\]/', REDCapTokenType::Identifier));
        $this->add(new TokenDefinition('/\[[a-z_0-9]*\(\d*\)\]/', REDCapTokenType::Identifier));
        $this->add(new TokenDefinition('/\s+/', REDCapTokenType::Whitespace));
        $this->add(new TokenDefinition('/"[a-z]*"/', REDCapTokenType::Constant));
        $this->add(new TokenDefinition('/"[a-z]"/', REDCapTokenType::Constant));
        $this->add(new TokenDefinition('/\'[a-z]*\'/', REDCapTokenType::Constant));
        $this->add(new TokenDefinition('/\'[a-z]\'/', REDCapTokenType::Constant));
        $this->add(new TokenDefinition('/true/', REDCapTokenType::Constant));
        $this->add(new TokenDefinition('/false/', REDCapTokenType::Constant));


    }

    /***
     * Function: stripTabsAndBreaks
     *           Remove and Line breaks, Tabs and leading/trailing spaces from the input string.
     *
     * @param string $inStr The string to be operated on
     * @return string       The result from the operation, if the input variable is not a string then return an empty string
     */
    public function stripTabsAndBreaks( $inStr) : string {
        if ( is_string( $inStr ) ) {
            return strtolower(trim(str_replace(array("\r\n", "\n", "\r", "\t"), array(" ", " ", " ", " "), $inStr)));
        }
        return "";
    }
}