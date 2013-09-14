<?php namespace System\Template\Expression;

class ConcatExpression extends BinaryExpression
{
    public function operator()
    {
        return '.';
    }
}