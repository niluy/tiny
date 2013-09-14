<?php namespace System;

class Redirect
{
	public static function to($uri='')
	{
		$url = Config::get('app.url').'/'.ltrim($uri, '/');
		header("Location: {$url}");
		exit();
	}
}