<?php
namespace App\Controllers;

use App\Models\AutomobileBill;
use App\Models\Automobile;
use App\Models\Bill;
use App\Models\Client;
//use App\Models\Manufacturer;
use App\Providers\View;
use App\Providers\Validator;
use DateTime;

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
        $cars = $autos->select();
        View::render('bill/create', ['cars' => $cars, 'clients' => $names]);
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

        $auto = new Automobile;
        $autoBill = new AutomobileBill;
        $bill = new Bill;
        $client = new Client;
        $currentClient = $client->selectId($data['client_id']);;

        $currentAuto = $auto->select();

        $currentAuto = $currentAuto[0];

        $data['total'] = $data['qt'] * $currentAuto['price'];

        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d');

        $data['bill_date'] = $currentDate;

        $serial = $currentAuto['serial_number'];

        $theCar = $auto->selectId($serial);
  
        var_dump($data);

        //$insertBill = $bill->insert($data);

    }
}

//FIXME: le insert pour la table bill marche pas
//TODO: CSS

