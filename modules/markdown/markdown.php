<?php

class Markdown extends Module
{
    public function __init()
    {
        $this->addAlias('post_content', 'wpautop');
    }
}