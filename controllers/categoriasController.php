<?php

use models\Categoria;

class categoriasController extends Controller
{
    //este contructor llama a objetos de la clase view, view a su vez nos permite llamar a smarty (gestor de vistas) 
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->getMessages();//elemento que nos ayuda a enviar un mensaje, mensajes de bienvenida por ejemplo
        $this->_view->assign('title','Categorias'); //la variable title que está en la pestña de la ventana tomara el nombre de Roles 
        $this->_view->assign('asunto','Lista de categorias de productos');

        $this->_view->assign('mensaje','No hay categorias registradas');//cuando no hayan datos en droles mostrara este mensaje
        $this->_view->assign('categorias',Categoria::select('id','nombre')->get());

        $this->_view->render('index');
    }

    public function create()
    {
        $this->getMessages();
        $this->_view->assign('title','Categorias');
        $this->_view->assign('asunto','Nueva Categoría');
        $this->_view->assign('categoria', Session::get('data'));
        $this->_view->assign('process','categorias/store');
        //encrypt sirve para encriptar un valor ,la llave para esto es la KEY de config.php
        //decrypt desencripta 
        $this->_view->assign('send',$this->encrypt($this->getForm())); 

        $this->_view->render('create');
    }

    public function store()
    {
        $this->validateForm("categorias/create",[
            'nombre'=>Filter::getText('nombre')
        ]);

        $role=Categoria::select('id')->where('nombre',Filter::getText('nombre'))->first();
        //select id from roles where nombre='role'; 
        if($role)
        {
            Session::set('msg_error','La categoria que ingreso ya existe, ingrese otro');
            $this->redirect('categorias/create');

        }

        $role=new Categoria;
        $role->nombre=Filter::getText('nombre');
        $role->save();

        Session::destroy('data');
        Session::set('msg_success','La categoria ha sido ingresado exitosamente');
        $this->redirect('categorias');
    
    }
}