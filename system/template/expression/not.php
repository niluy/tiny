<?php namespace System\Template;

class NotExpression extends UnaryExpression
{
    public function operator($compiler)
    {
        $compiler->raw('!');
    }
}