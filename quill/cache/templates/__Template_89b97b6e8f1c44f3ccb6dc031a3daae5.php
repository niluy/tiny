<?php
// /srv/www/tiny/themes/default/views/base.html 2013-09-13 23:28:26 GMT
class __Template_89b97b6e8f1c44f3ccb6dc031a3daae5 extends \System\Template\Template
{
    const PATH = '/srv/www/tiny/themes/default/views/base.html';

    public function __construct($loader, $helpers = array())
    {
        parent::__construct($loader, $helpers);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    public function display($context = array(), $blocks = array(), $macros = array())
    {
        /* line 1 -> 21 */
        echo '<!DOCTYPE html>
<html>
    <head>
        ';
        /* line 4 -> 26 */
        $this->displayBlock('head', $context, $blocks, $macros);
        /* line 9 -> 28 */
        echo '
    </head>
    <body ';
        /* line 11 -> 32 */
        echo $this->helper('body_class');
        /* line 11 -> 34 */
        echo '>
        <div id="site">
            <div id="header">
                <div id="branding">
                    <a href="';
        /* line 15 -> 40 */
        echo $this->helper('site_url');
        /* line 15 -> 42 */
        echo '"><img src="';
        /* line 15 -> 44 */
        echo $this->helper('asset_url', 'logo.png');
        /* line 15 -> 46 */
        echo '" class="logo"></a>
                    <span>';
        /* line 16 -> 49 */
        echo $this->getAttr((isset($context['blog']) ? $context['blog'] : null), 'name', false);
        /* line 16 -> 51 */
        echo '</span>
                </div>
                <div id="nav">
                    <ul>
                        <li><a href="';
        /* line 20 -> 57 */
        echo $this->helper('site_url', 'about');
        /* line 20 -> 59 */
        echo '">';
        /* line 20 -> 61 */
        echo $this->helper('__', 'About');
        /* line 20 -> 63 */
        echo '</a></li>
                        <li><a href="';
        /* line 21 -> 66 */
        echo $this->helper('site_url', 'docs');
        /* line 21 -> 68 */
        echo '">';
        /* line 21 -> 70 */
        echo $this->helper('__', 'Docs');
        /* line 21 -> 72 */
        echo '</a></li>
                        <li><a href="';
        /* line 22 -> 75 */
        echo $this->helper('site_url', 'extends');
        /* line 22 -> 77 */
        echo '">';
        /* line 22 -> 79 */
        echo $this->helper('__', 'Extends');
        /* line 22 -> 81 */
        echo '</a></li>
                        <li><a href="';
        /* line 23 -> 84 */
        echo $this->helper('site_url', 'themes');
        /* line 23 -> 86 */
        echo '">';
        /* line 23 -> 88 */
        echo $this->helper('__', 'Themes');
        /* line 23 -> 90 */
        echo '</a></li>
                        <li><a href="';
        /* line 24 -> 93 */
        echo $this->helper('site_url', 'forum');
        /* line 24 -> 95 */
        echo '">';
        /* line 24 -> 97 */
        echo $this->helper('__', 'Forum');
        /* line 24 -> 99 */
        echo '</a></li>
                    </ul>
                </div>
            </div>
            <div id="content">
                <div class="controls">
                ';
        /* line 30 -> 107 */
        if ((isset($context['current_user']) ? $context['current_user'] : null)) {
            /* line 30 -> 109 */
            echo '
                    <a href="';
            /* line 31 -> 112 */
            echo $this->helper('site_url', 'admin/post/new');
            /* line 31 -> 114 */
            echo '">';
            /* line 31 -> 116 */
            echo $this->helper('__', 'New');
            /* line 31 -> 118 */
            echo '</a> 
                    <span>/</span> 
                    <a href="';
            /* line 33 -> 122 */
            echo $this->helper('site_url', 'logout');
            /* line 33 -> 124 */
            echo '">';
            /* line 33 -> 126 */
            echo $this->helper('__', 'Logout');
            /* line 33 -> 128 */
            echo '</a>
                ';
        } else {
            /* line 34 -> 132 */
            echo '
                    <a href="';
            /* line 35 -> 135 */
            echo $this->helper('site_url', 'login');
            /* line 35 -> 137 */
            echo '">';
            /* line 35 -> 139 */
            echo $this->helper('__', 'Login');
            /* line 35 -> 141 */
            echo '</a>
                ';
        }
        /* line 36 -> 145 */
        echo '
                </div>
                ';
        /* line 38 -> 149 */
        $this->displayBlock('content', $context, $blocks, $macros);
        /* line 38 -> 151 */
        echo '
            </div>
            <div id="footer">
                ';
        /* line 41 -> 156 */
        $this->displayBlock('footer', $context, $blocks, $macros);
        /* line 46 -> 158 */
        echo '
            </div>
        </div>
    </body>
</html>';
    }

    /* line 8 -> 166 */
    public function block_title($context, $blocks = array(), $macros = array())
    {
    }

    /* line 4 -> 171 */
    public function block_head($context, $blocks = array(), $macros = array())
    {
        /* line 4 -> 174 */
        echo '
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <link rel="stylesheet" href="';
        /* line 6 -> 178 */
        echo $this->helper('theme_url', 'style.css');
        /* line 6 -> 180 */
        echo '">
            <link rel="stylesheet" href="';
        /* line 7 -> 183 */
        echo $this->helper('theme_url', 'theme.js');
        /* line 7 -> 185 */
        echo '">
            <title>';
        /* line 8 -> 188 */
        $this->displayBlock('title', $context, $blocks, $macros);
        /* line 8 -> 190 */
        echo ' - ';
        /* line 8 -> 192 */
        echo $this->getAttr((isset($context['blog']) ? $context['blog'] : null), 'name', false);
        /* line 8 -> 194 */
        echo '</title>
        ';
    }

    /* line 38 -> 199 */
    public function block_content($context, $blocks = array(), $macros = array())
    {
    }

    /* line 41 -> 204 */
    public function block_footer($context, $blocks = array(), $macros = array())
    {
        /* line 41 -> 207 */
        echo '
                    &copy; Copyright 2013 <a href="http://quillos.org/">System</a> | 
                    <a href="https://github.com/quillos/quill">Github</a>.
                    <br>
                    ';
        /* line 45 -> 213 */
        echo $this->helper('r');
        /* line 45 -> 215 */
        echo ', ';
        /* line 45 -> 217 */
        echo $this->helper('runtime');
        /* line 45 -> 219 */
        echo ', ';
        /* line 45 -> 221 */
        echo $this->helper('memory_usage');
        /* line 45 -> 223 */
        echo '
                ';
    }

    protected static $lines = array(21=>1,26=>4,28=>9,32=>11,34=>11,40=>15,42=>15,44=>15,46=>15,49=>16,51=>16,57=>20,59=>20,61=>20,63=>20,66=>21,68=>21,70=>21,72=>21,75=>22,77=>22,79=>22,81=>22,84=>23,86=>23,88=>23,90=>23,93=>24,95=>24,97=>24,99=>24,107=>30,109=>30,112=>31,114=>31,116=>31,118=>31,122=>33,124=>33,126=>33,128=>33,132=>34,135=>35,137=>35,139=>35,141=>35,145=>36,149=>38,151=>38,156=>41,158=>46,174=>4,178=>6,180=>6,183=>7,185=>7,188=>8,190=>8,192=>8,194=>8,207=>41,213=>45,215=>45,217=>45,219=>45,221=>45,223=>45,);
}
// end of /srv/www/tiny/themes/default/views/base.html
