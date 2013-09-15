<?php namespace System\Template;

class NegExpression extends UnaryExpression
{
    public function operator($compiler)
    {
        $compiler->raw('-');
    }
}