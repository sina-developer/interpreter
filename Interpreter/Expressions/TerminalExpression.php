<?php

namespace Interpreter\Expressions;

use Interpreter\Interfaces\Expression;

class TerminalExpression implements Expression{
    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function interpret(array $context){
        return intval($context[$this->name]);
    }
}