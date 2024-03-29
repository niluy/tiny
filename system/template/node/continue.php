<?php namespace System\Template;

class ContinueNode extends Node
{
    public function compile($compiler, $indent = 0)
    {
        $compiler->addTraceInfo($this, $indent);
        $compiler->raw("continue;\n", $indent);
    }
}
