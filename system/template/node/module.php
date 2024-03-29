<?php namespace System\Template;

use \System\Template\Loader;

class ModuleNode extends Node
{
    protected $name;
    protected $extends;
    protected $imports;
    protected $blocks;
    protected $macros;
    protected $body;
    public function __construct($name, $extends, $imports, $blocks, $macros,
        $body)
    {
        parent::__construct(0);
        $this->name = $name;
        $this->extends = $extends;
        $this->imports = $imports;
        $this->blocks = $blocks;
        $this->macros = $macros;
        $this->body = $body;
    }
    public function compile($compiler, $indent = 0)
    {
        $class = Loader::CLASS_PREFIX . md5($this->name);

        $compiler->raw("<?php\n");
        $compiler->raw(
            '// ' . $this->name . ' ' . gmdate('Y-m-d H:i:s T', time()) .
            "\n", $indent
        );
        $compiler->raw("class $class extends \\System\\Template\\Template\n", $indent);
        $compiler->raw("{\n", $indent);

        $compiler->raw('const PATH = ', $indent + 1);
        $compiler->repr($this->name);
        $compiler->raw(";\n\n");

        $compiler->raw(
            'public function __construct($loader, $helpers = array())' . "\n",
            $indent + 1
        );
        $compiler->raw("{\n", $indent + 1);
        $compiler->raw(
            'parent::__construct($loader, $helpers);' . "\n",
            $indent + 2
        );

        // blocks constructor
        if (!empty($this->blocks)) {
            $compiler->raw('$this->blocks = array(' . "\n", $indent + 2);
            foreach ($this->blocks as $name => $block) {
                $compiler->raw(
                    "'$name' => array(\$this, 'block_{$name}'),\n", $indent + 3
                );
            }
            $compiler->raw(");\n", $indent + 2);
        }

        // macros constructor
        if (!empty($this->macros)) {
            $compiler->raw('$this->macros = array(' . "\n", $indent + 2);
            foreach ($this->macros as $name => $macro) {
                $compiler->raw(
                    "'$name' => array(\$this, 'macro_{$name}'),\n", $indent + 3
                );
            }
            $compiler->raw(");\n", $indent + 2);
        }

        // imports constructor
        if (!empty($this->imports)) {
            $compiler->raw('$this->imports = array(' . "\n", $indent + 2);
            foreach ($this->imports as $module => $import) {
                $import->compile($compiler, $indent + 3);
            }
            $compiler->raw(");\n", $indent + 2);
        }

        $compiler->raw("}\n\n", $indent + 1);

        $compiler->raw(
            'public function display' .
            '($context = array(), $blocks = array(), $macros = array())' .
            "\n", $indent + 1
        );
        $compiler->raw("{\n", $indent + 1);

        // extends
        if ($this->extends) {
            $this->extends->compile($compiler, $indent + 2);
        }
        $this->body->compile($compiler, $indent + 2);
        $compiler->raw("}\n", $indent + 1);

        foreach ($this->blocks as $block) {
            $block->compile($compiler, $indent + 1);
        }

        foreach ($this->macros as $macro) {
            $macro->compile($compiler, $indent + 1);
        }

        // line trace info
        $compiler->raw("\n");
        $compiler->raw('protected static $lines = ', $indent + 1);
        $compiler->raw($compiler->getTraceInfo(true) . ";\n");

        $compiler->raw("}\n");
        $compiler->raw('// end of ' . $this->name . "\n");
    }
}