<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Genlogin;
	
	class GenloginController extends Controller
	{
		public function show() {
			$this->title = 'Генератор логинов';

            return $this->render('genlogin/show');
		}
	}