<?php
namespace App\Controllers;

use App\Models\Bill;
use App\Providers\View;
use App\Providers\Validator;

class BillController{


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
            return View::render('error', ['msg'=>'Manufacturer not found!']);
        }
    }
}