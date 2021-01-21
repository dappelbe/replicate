<?php


namespace NDORMS\REDCap\Nodes;


use MathParser\Interpreting\Visitors\Visitor;
use MathParser\Lexing\Token;
use MathParser\Parsing\Nodes\ConstantNode;
use MathParser\Parsing\Nodes\ExpressionNode;
use MathParser\Parsing\Nodes\FunctionNode;
use MathParser\Parsing\Nodes\IntegerNode;
use MathParser\Parsing\Nodes\NumberNode;
use MathParser\Parsing\Nodes\SubExpressionNode;
use MathParser\Parsing\Nodes\VariableNode;
use NDORMS\REDCap\REDCapTokenType;

class REDCapNode implements \MathParser\Interpreting\Visitors\Visitable
{

    /**
     * @inheritDoc
     */
    function accept(Visitor $visitor)
    {
        // TODO: Implement accept() method.
    }


    public static function redcapFactory( Token $token ) {

        switch ($token->getType()) {
            case REDCapTokenType::Integer:
                $x = intval($token->getValue());
                return new IntegerNode($x);
            case REDCapTokenType::RealNumber:
                $x = floatval(str_replace(',', '.', $token->getValue()));
                return new NumberNode($x);
            case REDCapTokenType::Identifier:
                return new VariableNode($token->getValue());
            case REDCapTokenType::Constant:
                return new ConstantNode($token->getValue());

            case REDCapTokenType::FunctionName:
                return new FunctionNode($token->getValue(), null);
            case REDCapTokenType::CommaSeperator:
            case REDCapTokenType::OpenParenthesis:
                return new SubExpressionNode($token->getValue());

            case REDCapTokenType::AdditionOperator:
            case REDCapTokenType::SubtractionOperator:
            case REDCapTokenType::MultiplicationOperator:
            case REDCapTokenType::DivisionOperator:
            case REDCapTokenType::ExponentiationOperator:
            case REDCapTokenType::LogicalAND:
            case REDCapTokenType::LogicalOR:
            case REDCapTokenType::GreaterThanOrEquals:
            case REDCapTokenType::GreaterThan:
            case REDCapTokenType::LessThanOrEquals:
            case REDCapTokenType::LessThan:
            case REDCapTokenType::NotEqualTo:
            case REDCapTokenType::EqualTo:
                return new REDCapExpressionNode(null, $token->getValue(), null);

            default:
                // echo "Node factory returning null on $token\n";
                return null;
        }

    }

}