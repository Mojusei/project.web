<?php
	use \Core\Route;
	
	return [
		new Route('/', 'main', 'index'), 

		new Route('/genlogin/', 'genlogin', 'show'), 
	];
	
