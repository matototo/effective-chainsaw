<?php
namespace App\Controllers;

use App\Models\Manufacturer;
use App\Providers\View;
use App\Providers\Validator;

class ManufacturerController{
    public function index() {
        $manufacturer = new Manufacturer;
        $select = $manufacturer->select();
        View::render('manufacturer/index', ['manufacturers' =>$select]);
    }

    public function show($data = []){
        if(isset($_GET['id']) && $data['id']!=null){
            $manufacturer = new Manufacturer;
            $selectId = $manufacturer->selectId($data['id']);
            if($selectId){
                return View::render('manufacturer/show', ['manufacturer'=>$selectId]);
            }else{
                return View::render('error');
            }

        }else{
            return View::render('error', ['msg'=>'Manufacturer not found!']);
        }
    }    
}