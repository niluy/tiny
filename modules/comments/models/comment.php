<?php

class Comment extends Model
{
    public static $table = 'comments';
    public function author()
    {
        return array(
            'name' => $this->author_name,
            'url' => $this->author_url,
            'avatar' => $this->author_avatar(),
        );
    }
    public function html()
    {
        return apply_filters('comment_content', $this->content);
    }
    public function author_avatar()
    {
        $avatar = avatar($this->author_email, 50, 'mm', 'g', false);
        $avatar = apply_filters('author_avatar', $avatar);
        return '<img src="' . $avatar . '" class="comment-author-avatar"/>';
    }
}