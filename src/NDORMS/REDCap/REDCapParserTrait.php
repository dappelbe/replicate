<?php


namespace NDORMS\REDCap;

use MathParser\Lexing\Lexer;
use MathParser\Lexing\Token;
use MathParser\Parsing\Parser;


/***
 * Trait REDCapParserTrait : Holds code from MathParser\Parsing; that we need to run
 * @package NDORMS\REDCap
 */
trait REDCapParserTrait
{

    /**
     * Remove Whitespace from the token list.
     *
     * @param array $tokens Input list of tokens
     * @retval Token[]
     */
    protected function filterTokens(array $tokens)
    {
        $filteredTokens = array_filter($tokens, function (Token $t) {
            return $t->getType() !== REDCapTokenType::Whitespace;
        });

        // Return the array values only, because array_filter preserves the keys
        return array_values($filteredTokens);
    }

}