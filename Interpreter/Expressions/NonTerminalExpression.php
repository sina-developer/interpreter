<?php

namespace Interpreter\Expressions;

use Interpreter\Interfaces\Expression;


abstract class NonTerminalExpression implements Expression{
    
    protected $left;
    protected $right;

    public function __construct(Expression $left , Expression $right){
        $this->left = $left;
        $this->right = $right;
    }

    abstract function interpret(array $context) ;

    public function getRight(){
        return $this->right;
    }

    public function setRight($right){
        $this->right = $right;
    }
}