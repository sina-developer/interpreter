<?php

namespace Interpreter;

use Interpreter\Expressions\TerminalExpression;
use Interpreter\Expressions\NonTerminals\MinusExpression;
use Interpreter\Expressions\NonTerminals\PlusExpression;

class InterpreterClient{

    public function parse(string $data , array $context){
        $expr = $this->parseExpression($data);
        return $expr->interpret($context);
    }

    private function parseList(array &$stack , array $list , int &$index){
        $token = $list[$index];

        switch ($token) {
            case '-':
                list ($left , $right) = $this->fetchArgs($stack , $list , $index);
                return new MinusExpression($left , $right);
            case '+':
                list ($left , $right) = $this->fetchArgs($stack , $list , $index);
                return new PlusExpression($left , $right);
            default:
                return new TerminalExpression($token);
                break;
        }
    }

    private function fetchArgs(array &$stack , array $list , int &$index){
        $left = array_pop($stack);

        $right = array_pop($stack);
        
        if($right == null){
            ++$index;
            $this->parseListAndPush($stack , $list , $index);
            $right = array_pop($stack);
        }

        return [$left , $right];
    }

    private function parseListAndPush(array &$stack , array $list , int &$index){
        array_push($stack , $this->parseList($stack , $list , $index));
    }


    private function parseExpression(string $str){
        $stack = [];
        $list = explode(" " , $str);
        for ($i=0; $i < count($list); $i++) { 
            $this->parseListAndPush($stack , $list , $i);
        }
        return array_pop($stack);
    }

}