<?php

use \PHPUnit\Framework\TestCase;
use \NDORMS\REDCap\REDCapLexer;

final class REDCapLexerTest
    extends TestCase
{

    private $lexer = null;

    public function setUp(): void
    {
        parent::setUp();
        $this->lexer = new REDCapLexer();
    }

    public function test_StripTabsAndBreaks_returns_emptyString_with_null_input() {
        $expected = "";
        $actual = $this->lexer->stripTabsAndBreaks(null);
        $this->assertEquals($expected, $actual);
    }
}