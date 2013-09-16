<?php
// /srv/www/tiny/themes/default/views/content.html 2013-09-13 23:28:26 GMT
class __Template_68e671210ba7b14f402c991751cf6221 extends \System\Template\Template
{
    const PATH = '/srv/www/tiny/themes/default/views/content.html';

    public function __construct($loader, $helpers = array())
    {
        parent::__construct($loader, $helpers);
    }

    public function display($context = array(), $blocks = array(), $macros = array())
    {
        /* line 1 -> 15 */
        echo '<div id="post-';
        /* line 1 -> 17 */
        echo $this->getAttr((isset($context['post']) ? $context['post'] : null), 'id', false);
        /* line 1 -> 19 */
        echo '" class="post">
    <div class="post-header">
        <h1 class="post-title">
            <a href="';
        /* line 4 -> 24 */
        echo $this->getAttr((isset($context['post']) ? $context['post'] : null), 'url', false);
        /* line 4 -> 26 */
        echo '">';
        /* line 4 -> 28 */
        echo $this->getAttr((isset($context['post']) ? $context['post'] : null), 'title', false);
        /* line 4 -> 30 */
        echo '</a>
            ';
        /* line 5 -> 33 */
        if ((isset($context['current_user']) ? $context['current_user'] : null)) {
            /* line 5 -> 35 */
            echo '
            <span class="post-meta"> ';
            /* line 6 -> 38 */
            echo $this->getAttr((isset($context['post']) ? $context['post'] : null), 'edit_url', array($this->helper('__', 'Edit'), ));
            /* line 6 -> 40 */
            echo ' ';
            /* line 6 -> 42 */
            echo $this->getAttr((isset($context['post']) ? $context['post'] : null), 'delete_url', array($this->helper('__', 'Delete'), ));
            /* line 6 -> 44 */
            echo '</span>
            ';
        }
        /* line 7 -> 48 */
        echo '
        </h1>
    </div>
    <div class="post-content">';
        /* line 10 -> 53 */
        echo $this->getAttr((isset($context['post']) ? $context['post'] : null), 'html', false);
        /* line 10 -> 55 */
        echo '</div>
</div>';
    }

    protected static $lines = array(15=>1,17=>1,19=>1,24=>4,26=>4,28=>4,30=>4,33=>5,35=>5,38=>6,40=>6,42=>6,44=>6,48=>7,53=>10,55=>10,);
}
// end of /srv/www/tiny/themes/default/views/content.html
