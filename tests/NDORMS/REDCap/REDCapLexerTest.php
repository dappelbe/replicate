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

    public function test_StripTabsAndBreaks_returns_emptyString_with_integer_input() {
        $expected = "";
        $actual = $this->lexer->stripTabsAndBreaks(3);
        $this->assertEquals($expected, $actual);
    }

    public function test_StripTabsAndBreaks_returns_Fred_with_Fred_input() {
        $expected = "fred";
        $actual = $this->lexer->stripTabsAndBreaks('Fred');
        $this->assertEquals($expected, $actual);
    }

    public function test_StripTabsAndBreaks_returns_Fred_and_Frank_with_Complex_input() {
        $expected = "fred and  frank";
        $actual = $this->lexer->stripTabsAndBreaks(" Fred\tand" . PHP_EOL . "\r\nFrank    ");
        $this->assertEquals($expected, $actual);
    }

    public function testLexerIdentifiesVar1EqualsVar2() {
        $input = "[fred] = [frank]";
        $actual = $this->lexer->tokenize( $this->lexer->stripTabsAndBreaks($input));
        $this->assertTrue( count($actual) > 0 );
        $this->assertTrue( count($actual) == 5 );
    }

    public function testLexerIdentifiesVar1EqualsOne() {
        $input = "[fred] = 1";
        $actual = $this->lexer->tokenize( $this->lexer->stripTabsAndBreaks($input));
        $this->assertTrue( count($actual) > 0 );
        $this->assertTrue( count($actual) == 5 );
    }

    public function testLexerIdentifiesDatedifftrue() {
        $input = "datediff([today],[fred], \"d\", \"dmy\", true) = 1";
        $actual = $this->lexer->tokenize( $this->lexer->stripTabsAndBreaks($input));
        $this->assertTrue( count($actual) > 0 );
        $this->assertTrue( count($actual) == 19 );
    }

    public function testLexerIdentifiesDatedifffalse() {
        $input = "datediff([today],[fred], \"d\", \"dmy\", false) = 1";
        $actual = $this->lexer->tokenize( $this->lexer->stripTabsAndBreaks($input));
        $this->assertTrue( count($actual) > 0 );
        $this->assertTrue( count($actual) == 19 );
    }

    public function testLexerIdentifiesCheckboxVar1EqualsOne() {
        $input = "[fred(99)] = 1";
        $actual = $this->lexer->tokenize( $this->lexer->stripTabsAndBreaks($input));
        $this->assertTrue( count($actual) > 0 );
        $this->assertTrue( count($actual) == 5 );
    }

    public function testLexerIdentifiesCheckboxVar1AtVisitEqualsOne() {
        $input = "[evt_arm_1][fred(1)] = 1";
        $actual = $this->lexer->tokenize( $this->lexer->stripTabsAndBreaks($input));
        $this->assertTrue( count($actual) > 0 );
        $this->assertTrue( count($actual) == 6 );
    }
    public function testLexerIdentifiesVar1AtVisitEqualsOne() {
        $input = "[evt_arm_1][fred_77] = 1";
        $actual = $this->lexer->tokenize( $this->lexer->stripTabsAndBreaks($input));
        $this->assertTrue( count($actual) > 0 );
        $this->assertEquals( 5, count($actual) );
    }

}