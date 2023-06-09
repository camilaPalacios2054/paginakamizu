<?php

use models\Role;

class rolesController extends Controller
{
    //este contructor llama a objetos de la clase view, view a su vez nos permite llamar a smarty (gestor de vistas) 
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->getMessages();//elemento que nos ayuda a enviar un mensaje, mensajes de bienvenida por ejemplo
        $this->_view->assign('title','Roles'); //la variable title que está en la pestña de la ventana tomara el nombre de Roles 
        $this->_view->assign('asunto','Lista de roles en sistema');

        $this->_view->assign('mensaje','No hay roles registrados');//cuando no hayan datos en droles mostrara este mensaje
        $this->_view->assign('roles',Role::select('id','nombre')->get());

        $this->_view->render('index');
    }

    public function create()
    {
        $this->getMessages();
        $this->_view->assign('title','Roles');
        $this->_view->assign('asunto','Nuevo rol');
        $this->_view->assign('role', Session::get('data'));
        $this->_view->assign('process','roles/store');
        //encrypt sirve para encriptar un valor ,la llave para esto es la KEY de config.php
        //decrypt desencripta 
        $this->_view->assign('send',$this->encrypt($this->getForm())); 

        $this->_view->render('create');
    }

    public function store()
    {
        $this->validateForm("roles/create",
        ['nombre'=>Filter::getText('nombre')
        ]);

        $role=Role::select('id')->where('nombre',Filter::getText('nombre'))->first();
        //select id from roles where nombre='role'; 
        if($role)
        {
            Session::set('msg_error','El rol ingresado ya existe, ingrese otro');
            $this->redirect('roles/create');

        }

        $role=new Role;
        $role->nombre=Filter::getText('nombre');
        $role->save();

        Session::destroy('data');
        Session::set('msg_success','El rol ha sido ingresado exitosamente');
        $this->redirect('roles');
    
    }
}