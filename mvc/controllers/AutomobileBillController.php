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
        $car = new Automobile;
        $select = $automobileBill->select();
        
        $i = 0;
        $cars = [];
        foreach ($select as $bill) {
            $serial = $bill['serial_number'];

            $currentCar = $car->selectId($serial);

            $cars[$i] = $currentCar;
            $i++;
        }

        View::render('bill/index', ['bills' =>$select, 'cars'=>$cars]);
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
            $bill = new AutomobileBill;
            $car = new Automobile;
            $client = new Client;
            $selectBill = $bill->selectId($data['id']);
            $name = $client->selectId($selectBill['client_id']);
            $currentCar = $car->selectId($selectBill['serial_number']);
            
            if($selectBill){
                return View::render('bill/show', ['bill'=>$selectBill, 'car' => $currentCar, 'client' => $name]);
            }else{
                return View::render('error');
            }

        }else{
            return View::render('error', ['msg'=>'Bill not found!']);
        }    
    }

    public function store($data=[]){

        $auto = new Automobile;
        $bill = new AutomobileBill;
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

        if($insertBill) {
            return View::redirect('bill/show?id='.$insertBill);
        }
    }

    public function specialdelete($data){
        $bill = new AutomobileBill;
        $delete = $bill->delete($data['id']);
        if($delete){
            return View::redirect('bill');
        }else{
            return View::render('error');
        }
    }
}

// J'ai changer le type de data pour la date dans bill bill_date pour simplifier le insert ! comme je me retrouve a avoir une date en string je ne voulais pas de conflits lors de l'insertion