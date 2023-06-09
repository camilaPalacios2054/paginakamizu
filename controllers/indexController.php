<?php

class indexController extends Controller
{

	public function __construct(){ //inicia ciertas funciones que ejecuta al inicio
		//todo lo que tengamos dentro de la carpeta controllers va a heredar de la clase padre Controller 
		 
		// $this->verificarSession();
		// Session::tiempo();
		parent::__construct();
	}

	public function index()
	{
		$this->getMessages();
		$this->_view->assign('title','Página Inicio');
		$this->_view->render('index');
	}
}