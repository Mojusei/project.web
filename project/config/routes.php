<?php
	use \Core\Route;
	
	return [
		new Route('/', 'main', 'index'), 

		new Route('/genlogin', 'genlogin', 'show'), 

		new Route('/word', 'word', 'show'),

		new Route('/dice', 'dice', 'show'),
	];
	
