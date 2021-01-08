<?php

namespace NDORMS\REDCap;

/***
 * Class REDCapTokenType
 */
final class REDCapTokenType
{
    /** Token representing a (not necessarily positive) integer */
    const Integer = 2;
    /** Token representing a floating point number */
    const RealNumber = 3;
    /** Token representing an identifier, i.e. a variable name. */
    const Identifier = 20;
    /** Token representing an opening parenthesis, i.e. '(' */
    const OpenParenthesis = 31;
    /** Token representing a closing parenthesis, i.e. ')' */
    const CloseParenthesis = 32;
    /** Token representing a unary minus. Not used. This is the responsibility of the Parser */
    const UnaryMinus = 99;
    /** Token representing '+' */
    const AdditionOperator = 100;
    /** Token representing '-' */
    const SubtractionOperator = 101;
    /** Token representing '*' */
    const MultiplicationOperator = 102;
    /** Token representing '/' */
    const DivisionOperator = 103;
    /** Token representing '^' */
    const ExponentiationOperator = 104;
    /** Token representing the logical and */
    const LogicalAND = 105;
    /** Token representing the logical or */
    const LogicalOR  = 106;
    const GreaterThanOrEquals = 107;
    const GreaterThan = 108;
    const LessThanOrEquals = 109;
    const LessThan = 110;
    const NotEqualTo = 111;
    const EqualTo = 112;

    /** Token represented a function name, e.g. 'if' */
    const FunctionName = 200;
    /** Token represented a known constant, e.g. 'today */
    const Constant = 300;
}