<?php

class Controller_Reg extends Controller
{
	
	function action_index()
	{
		$this->view->generate("reg_view.php");
	}

}