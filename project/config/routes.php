<?php
	use \Core\Route;
	
	return [
		new Route('/hello/', 'hello', 'index'), 

		new Route('/genlogin/', 'genlogin', 'show'), 
	];
	
