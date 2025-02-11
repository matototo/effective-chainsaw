<?php
namespace App\Controllers;

use App\Models\AutomobileBill;
use App\Models\Automobile;
use App\Models\Bill;
use App\Models\Client;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;
use DateTime;

class AutomobileBillController{

    public function __construct()
    {
        Auth::session();
    }
    
    public function index() {
        $automobileBill = new AutomobileBill;
        $car = new Automobile;
        $select = $automobileBill->select();
        $cars = $car->select();
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
        $currentClient = $client->selectId($data['client_id']);
        $validator = new Validator;
        $validator->field('serial_number', $data['serial_number'])->required();
        $validator->field('client_id', $data['client_id'])->required();
        $validator->field('qt', $data['qt'])->number();
        if($validator->isSuccess()) {
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
        }else{
            $errors = $validator->getErrors();
            $cars = $auto->select();
            $names = $client->select();
            return View::render('bill/create', ['errors'=>$errors, 'cars' => $cars, 'clients' => $names, 'bill' => $data]);
            // print_r($data);
            // print_r($names);
            // die();
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
