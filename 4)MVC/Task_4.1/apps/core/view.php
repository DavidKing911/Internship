<?php
class View
{
	function generate($content_view)
	{
		include 'apps/views/'.$content_view;
	}
}