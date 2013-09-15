<?php namespace System\Template;

class ConcatExpression extends BinaryExpression
{
    public function operator()
    {
        return '.';
    }
}