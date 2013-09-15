<?php namespace System\Template;

class PosExpression extends UnaryExpression
{
    public function operator($compiler)
    {
        $compiler->raw('+');
    }
}