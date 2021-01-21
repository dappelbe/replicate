<?php
require '../../../vendor/autoload.php';

$lexer = new \NDORMS\REDCap\REDCapLexer();
$input = "[fred] = [frank]";
$actual = $lexer->tokenize( $lexer->stripTabsAndBreaks($input));
$aa = "";
