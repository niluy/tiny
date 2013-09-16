<?php
// /srv/www/tiny/modules/comments/views/comments.html 2013-09-13 23:28:26 GMT
class __Template_5bddb3f13988445ffdc3108a3c831339 extends \System\Template\Template
{
    const PATH = '/srv/www/tiny/modules/comments/views/comments.html';

    public function __construct($loader, $helpers = array())
    {
        parent::__construct($loader, $helpers);
    }

    public function display($context = array(), $blocks = array(), $macros = array())
    {
        /* line 1 -> 15 */
        echo '<div id="comments">
    <div id="respond">
        <h2>Reply</h2>
        <form action="';
        /* line 4 -> 20 */
        echo $this->helper('site_url', 'comment/add');
        /* line 4 -> 22 */
        echo '" method="POST">
            <input type="hidden" name="post_id" value="';
        /* line 5 -> 25 */
        echo $this->getAttr((isset($context['post']) ? $context['post'] : null), 'id', false);
        /* line 5 -> 27 */
        echo '">
            <p>
                <label>Name</label>
                <input type="text" name="name">
            </p>
            <p>
                <label>Email</label>
                <input type="text" name="email">
            </p>
            <p>
                <label>Url</label>
                <input type="text" name="url">
            </p>
            <p>
                <label>Comment</label>
                <textarea name="content"></textarea>
            </p>
            <p>
                <button type="submit">Publish</button>
            </p>
        </form>
    </div>
    <div id="commentlist">
        <h2>Comment List</h2>
        ';
        /* line 29 -> 53 */
        $this->pushContext($context, 'loop');
        $this->pushContext($context, 'comment');
        foreach (($context['loop'] = $this->iterate($context, (isset($context['comments']) ? $context['comments'] : null))) as $context['comment']) {
            /* line 29 -> 57 */
            echo '
        <div class="comment">
            <h3>
                <a href="';
            /* line 32 -> 62 */
            echo $this->getAttr($this->getAttr((isset($context['comment']) ? $context['comment'] : null), 'author', false), 'url', false);
            /* line 32 -> 64 */
            echo '">';
            /* line 32 -> 66 */
            echo $this->getAttr($this->getAttr((isset($context['comment']) ? $context['comment'] : null), 'author', false), 'name', false);
            /* line 32 -> 68 */
            echo '</a>
                <a href="';
            /* line 33 -> 71 */
            echo $this->getAttr($this->getAttr((isset($context['comment']) ? $context['comment'] : null), 'author', false), 'url', false);
            /* line 33 -> 73 */
            echo '">';
            /* line 33 -> 75 */
            echo $this->getAttr($this->getAttr((isset($context['comment']) ? $context['comment'] : null), 'author', false), 'avatar', false);
            /* line 33 -> 77 */
            echo '</a>
                <small class="comment-date">';
            /* line 34 -> 80 */
            echo $this->helper('rdate', $this->getAttr((isset($context['comment']) ? $context['comment'] : null), 'date', false));
            /* line 34 -> 82 */
            echo '</small>
            </h3>
            <div class="comment-content">';
            /* line 36 -> 86 */
            echo $this->getAttr((isset($context['comment']) ? $context['comment'] : null), 'html', false);
            /* line 36 -> 88 */
            echo '</div>
        </div>
        ';
        }
        $this->popContext($context, 'loop');
        $this->popContext($context, 'comment');
        /* line 38 -> 95 */
        echo '
    </div>
</div>';
    }

    protected static $lines = array(15=>1,20=>4,22=>4,25=>5,27=>5,53=>29,57=>29,62=>32,64=>32,66=>32,68=>32,71=>33,73=>33,75=>33,77=>33,80=>34,82=>34,86=>36,88=>36,95=>38,);
}
// end of /srv/www/tiny/modules/comments/views/comments.html
