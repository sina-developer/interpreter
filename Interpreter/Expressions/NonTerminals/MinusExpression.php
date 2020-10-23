<?php 

namespace Interpreter\Expressions\NonTerminals;

use Interpreter\Expressions\NonTerminalExpression;

class MinusExpression extends NonTerminalExpression{
    public function interpret(array $context){
        return intval($this->left->interpret($context) - $this->right->interpret($context));
    }
}