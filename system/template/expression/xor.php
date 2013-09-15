<?php namespace System\Template;

class XorExpression extends BinaryExpression
{
    public function operator()
    {
        return 'xor';
    }
}