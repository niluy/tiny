<?php
// /srv/www/tiny/themes/default/views/post.html 2013-09-13 23:28:26 GMT
class __Template_34b09f6f7d6438c4cc5b4045f64736ef extends \System\Template\Template
{
    const PATH = '/srv/www/tiny/themes/default/views/post.html';

    public function __construct($loader, $helpers = array())
    {
        parent::__construct($loader, $helpers);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    public function display($context = array(), $blocks = array(), $macros = array())
    {
        /* line 1 -> 19 */
        $this->parent = $this->loadExtends('base.html');
        if (isset($this->parent)) {
            return $this->parent->display($context, $blocks + $this->blocks, $macros + $this->macros);
        }
        /* line 1 -> 24 */
        echo '

';
        /* line 3 -> 28 */
        $this->displayBlock('title', $context, $blocks, $macros);
        /* line 3 -> 30 */
        echo '

';
        /* line 5 -> 34 */
        $this->displayBlock('content', $context, $blocks, $macros);
    }

    /* line 3 -> 38 */
    public function block_title($context, $blocks = array(), $macros = array())
    {
        /* line 3 -> 41 */
        echo $this->getAttr((isset($context['post']) ? $context['post'] : null), 'title', false);
    }

    /* line 5 -> 45 */
    public function block_content($context, $blocks = array(), $macros = array())
    {
        /* line 5 -> 48 */
        echo '

    ';
        /* line 7 -> 52 */
        $this->loadInclude('content.html')->display($context);
        /* line 7 -> 54 */
        echo '

    ';
        /* line 9 -> 58 */
        $this->loadModule('comments', array($this->getAttr((isset($context['post']) ? $context['post'] : null), 'id', false), ));
        /* line 9 -> 60 */
        echo '

';
    }

    protected static $lines = array(19=>1,24=>1,28=>3,30=>3,34=>5,41=>3,48=>5,52=>7,54=>7,58=>9,60=>9,);
}
// end of /srv/www/tiny/themes/default/views/post.html
