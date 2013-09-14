<?php namespace System\Template\Expression;

class XorExpression extends BinaryExpression
{
    public function operator()
    {
        return 'xor';
    }
}