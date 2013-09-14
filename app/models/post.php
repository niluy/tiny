<?php 

class Post extends Model
{
	public static $table = 'posts';
	public function __construct(){}
	public function id()
	{
		return $this->id;
	}
	public function title()
	{
		return $this->title;
	}
	public function html()
	{
		return apply_filters('post_content', $this->content);
	}
	public function url()
	{
		return '/post/'.$this->id;
	}
	public function edit_url($text = 'Edit')
	{
		return '<a href="/admin/post/edit/'.$this->id.'">'.$text.'</a>';
	}
	public function delete_url($text = 'Delete')
	{
		return '<a href="/admin/post/delete/'.$this->id.'">'.$text.'</a>';
	}
	public function comments()
	{
		return Comment::where('post_id','=',$this->id)->where('approved','=',1)->sort('date','DESC')->get();
	}
}