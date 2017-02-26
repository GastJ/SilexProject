<?php namespace Controllers; 
use Silex\Application as App; 
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\Form\Extension\Core\Type\FormType; 
use Symfony\Component\Form\Extension\Core\Type\ChoiceType; 
class FrontController {    
	private $app;    // silex va injecter l'objet $app ici vous pourrez alors l'utiliser dans le script    
	public function __construct(App $app){        
		$this->app = $app;
	}
} 
