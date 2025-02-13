<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Main;
	
	class MainController extends Controller
	{
		public function index() {
			$this->title = 'Главная страница';
			
			
			return $this->render('main/index');
		}
	}