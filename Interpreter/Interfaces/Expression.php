<?php

namespace Interpreter\Interfaces;

interface Expression{
    public function interpret(array $context);
}