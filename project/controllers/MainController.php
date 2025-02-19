<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class MainController extends Controller
	{
		public function index() {
			$this->title = 'Главная страница';
			
			
			return $this->render('main/index');
		}
	}