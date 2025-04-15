<?php
class View
{
	function generate($content_view, $users = 0)
	{
		include 'apps/views/'.$content_view;
	}
}