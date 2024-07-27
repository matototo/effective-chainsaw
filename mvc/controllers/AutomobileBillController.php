<?php
namespace App\Controllers;

use App\Models\AutomobileBill;
use App\Models\Automobile;
use App\Models\Bill;
use App\Models\Client;
//use App\Models\Manufacturer;
use App\Providers\View;
use App\Providers\Validator;

class AutomobileBillController{
    public function index() {
        $automobileBill = new AutomobileBill;
        $select = $automobileBill->select();
        View::render('bill/index', ['bills' =>$select]);
    }

    public function create() {
        $autos = new Automobile;
        $clients = new Client;
        $names = $clients->select();
        $serials = $autos->select();
        View::render('bill/create', ['serials' => $serials, 'clients' => $names]);
    }


    public function show($data = []){
        if(isset($_GET['id']) && $data['id']!=null){
            $bill = new Bill;
            $selectId = $bill->selectId($data['id']);
            if($selectId){
                return View::render('bill/show', ['bill'=>$selectId]);
            }else{
                return View::render('error');
            }

        }else{
            return View::render('error', ['msg'=>'Bill not found!']);
        }    
    }

    public function store($data=[]){

        $validator = new Validator;
        $validator->field('serial_number', $data['serial_number'])->min(17)->max(17);
        $validator->field('qt', $data['qt'])->min(1);
        if($validator->isSuccess()){
            $auto = new Automobile;
            $automobileBill = new AutomobileBill;
            $client = new Client;
            $selectIdAuto= $auto->selectId($data['serial_number']);
            $selectIdClient = $client->selectId($data['name']);
            $total = $data['qt'] * $selectIdAuto['price'];
            $insert = $automobileBill->insert($data);
            
            if($insert){
                return View::redirect('bill/show?id='.$insert);
            }else{
                return View::render('error');
            }
    }else{
            $errors = $validator->getErrors();
            return View::render('bill/create', ['errors'=>$errors, 'bill'=>$data]);
    }
    }
}

//FIXME: le insert pour la table bill marche pas
//TODO: CSS

