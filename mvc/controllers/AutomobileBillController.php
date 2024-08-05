<?php
namespace App\Controllers;

use App\Models\AutomobileBill;
use App\Models\Automobile;
use App\Models\Bill;
use App\Models\Client;
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
  

        $insertBill = $bill->insert($data);

        $data['bill_number'] = $insertBill;


        $insertAutoBill = $autoBill->insert($data);


        if($insertBill && $insertAutoBill) {
            return View::redirect('bill/show?id='.$insertBill);
        }
    }
}

// J'ai changer le type de data pour la date dans bill bill_date pour simplifier le insert ! comme je me retrouve a avoir une date en string je ne voulais pas de conflits lors de l'insertion

