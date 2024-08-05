<?php
namespace App\Controllers;

use App\Models\Automobile;
use App\Providers\View;
use App\Providers\Validator;

class AutomobileController{
    public function index() {
        $automobile = new Automobile;
        $selectAutos = $automobile->select('name');
        View::render('automobile/index', ['automobiles' => $selectAutos]);
    }

    public function show($data = []){
        if(isset($_GET['serial_number']) && $data['serial_number']!=null){
            $automobile = new Automobile;
            $selectId = $automobile->selectId($data['serial_number']);
            if($selectId){
                return View::render('automobile/show', ['automobile'=>$selectId]);
            }else{
                return View::render('error');
            }

        }else{
            return View::render('error', ['msg'=>'Automobile not found!']);
        }    
    }
}