<?php namespace System\Template;

class FunctionCallExpression extends Expression
{
    protected $node;
    protected $args;

    public function __construct($node, $args, $line)
    {
        parent::__construct($line);
        $this->node = $node;
        $this->args = $args;
    }

    public function compile($compiler, $indent = 0)
    {
        $compiler->raw('$this->helper(');
        $this->node->repr($compiler);
        foreach ($this->args as $arg) {
            $compiler->raw(', ');
            $arg->compile($compiler);
        }
        $compiler->raw(')');
    }

}