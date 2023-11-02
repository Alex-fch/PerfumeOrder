<?php
	/*
	* La classe HomeController gére la vue home.
	*/
	class HomeController extends BaseController
	{
		/*
		* Permet d'afficher la vue home
		*/
		public function Home()
		{
			$this->view("home");	
		}
	}