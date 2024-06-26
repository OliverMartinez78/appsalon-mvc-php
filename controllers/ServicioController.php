<?php

namespace Controllers;

use MVC\Router;
use Model\Servicio;

class ServicioController {
    public static function index (Router  $router) {
        \iniciarSession();
        \isAdmin();

        $servicios =  Servicio::all();

        $router->render('servicios/index', [
            'nombre'  => $_SESSION['nombre'],
            'servicios' => $servicios,
        ]);
    }
    //Crear Servicio
    public static function crear (Router  $router) {
        \iniciarSession();
        \isAdmin();
        $servicio = new Servicio;
        $alertas  = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);

            $alertas = $servicio->validar(); 

            if(empty($alertas)) {
                $servicio->guardar();
                header('Location: /servicios');
            }
        }

        $router->render('servicios/crear', [
            'nombre'  => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas,
        ]);
    }

    //Actualizar el servicio
    public static function actualizar (Router  $router) {
        \iniciarSession();
        \isAdmin();
        if(!is_numeric($_GET['id'])) return;
        $servicio = Servicio::find($_GET['id']);
        $alertas  = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);
            $alertas = $servicio->validar();
            if(empty($alertas)) {
                $servicio->guardar();
                header('Location: /servicios'); 
            }
        }

        $router->render('servicios/actualizar', [
            'nombre'  => $_SESSION['nombre'],
            'servicio'=> $servicio,
            'alertas' => $alertas,
        ]);
    }

    //Elimina el Servicio
    public static function eliminar () {
        \iniciarSession();
        \isAdmin();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id =  $_POST['id'];
            $servicio = Servicio::find($id);
            $servicio->eliminar();
            header('Location:  /servicios');
        }
    }
}