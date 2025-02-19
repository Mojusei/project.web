<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class DiceController extends Controller
	{
		public function show() {
			$this->title = 'Кубик';
			
			
			return $this->render('dice/show');
		}
	}