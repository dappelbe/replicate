<?php


namespace NDORMS\REDCap;


use PHPUnit\Framework\TestCase;

class REDCapParserTest
    extends TestCase
{
    private $parser = null;

    public function setUp(): void
    {
        parent::setUp();
        $this->parser = new REDCapParser();
    }

    public function test_has_splitPoint_returns_0_with_A_NULL_argument() {
        $expected = 0;
        $actual = $this->parser->hasSplitPoint(null);
        $this->assertEquals($expected, $actual);
    }

    public function test_has_splitPoint_returns_0_with_An_empty_string_argument() {
        $expected = 0;
        $actual = $this->parser->hasSplitPoint("");
        $this->assertEquals($expected, $actual);
    }

    public function test_has_splitPoint_returns_0_with_A_string_with_no_seperator_argument() {
        $expected = 0;
        $actual = $this->parser->hasSplitPoint("[fred]]");
        $this->assertEquals($expected, $actual);
    }

    public function test_has_splitPoint_returns_0_with_A_string_with_no_seperator_argument_datediff() {
        $expected = 0;
        $actual = $this->parser->hasSplitPoint("datedif('today', [fred], 'd', 'dmy', true)");
        $this->assertEquals($expected, $actual);
    }

    public function test_has_splitPoint_returns_6_with_A_string_with_an_equals_seperator_argument() {
        $expected = 0;
        $actual = $this->parser->hasSplitPoint("[fred]=1");
        $this->assertEquals($expected, $actual);
    }

    public function test_has_splitPoint_returns_6_with_A_string_with_a_gt_seperator_argument() {
        $expected = 0;
        $actual = $this->parser->hasSplitPoint("[fred]>1");
        $this->assertEquals($expected, $actual);
    }

    public function test_has_splitPoint_returns_6_with_A_string_with_a_gte_seperator_argument() {
        $expected = 0;
        $actual = $this->parser->hasSplitPoint("[fred]>=1");
        $this->assertEquals($expected, $actual);
    }

}