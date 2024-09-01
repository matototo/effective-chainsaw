<?php
namespace App\Controllers;

use App\Models\Client;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class ClientController{

    public function __construct()
    {
        Auth::session();
    }
    
    public function index() {
        $client = new Client;
        $select = $client->select();
        if($select){
            return View::render('client/index', ['clients'=> $select]);
        }
        return View::render('error');
    }

    public function create() {
        Auth::session();
        View::render('client/create');
    }

    public function show($data = []){
        if(isset($_GET['id']) && $data['id']!=null){
            $client = new Client;
            $selectId = $client->selectId($data['id']);
            if($selectId){
                return View::render('client/show', ['client'=>$selectId]);
            }else{
                return View::render('error');
            }
        }else{
            return View::render('error', ['msg'=>'Client not found!']);
        }    
    }

    public function edit($data = []){
        if(isset($_GET['id']) && $data['id']!=null){
            $client = new Client;
            $selectId = $client->selectId($data['id']);
            if($selectId){
                return View::render('client/edit', ['client'=>$selectId]);
            }else{
                return View::render('error');
            }
        }else{
            return View::render('error');
        }    
    }

    public function store($data=[]){

       $validator = new Validator;
       $validator->field('name', $data['name'])->min(3)->max(45);
       $validator->field('address', $data['address'])->max(45);
       $validator->field('phone', $data['phone'])->max(20);
       $validator->field('zip_code', $data['zip_code'], 'zip code')->max(10);
       $validator->field('email', $data['email'])->required()->email()->max(45);
       if($validator->isSuccess()){
            $client = new Client;
            $insert = $client->insert($data);
            
            if($insert){
                return View::redirect('client/show?id='.$insert);
            }else{
                return View::render('error');
            }
       }else{
            $errors = $validator->getErrors();
            return View::render('client/create', ['errors'=>$errors, 'client'=>$data]);
       }
    }

    public function update($data, $get_data){
        if(isset($get_data['id']) && $get_data['id']!=null){
            $id = $get_data['id'];
            $validator = new Validator;
            $validator->field('name', $data['name'])->min(3)->max(45);
            $validator->field('address', $data['address'])->max(45);
            $validator->field('phone', $data['phone'])->max(20);
            $validator->field('zip_code', $data['zip_code'], 'zip code')->max(10);
            $validator->field('email', $data['email'])->required()->email()->max(45);
    
            if($validator->isSuccess()){
                echo "success";
                $client = new Client;
                $update = $client->update($data, $id);
                if($update){
                    return View::redirect('client/show?id='.$id);
                }else{
                    return View::render('error');
                }
            }else{
                $errors = $validator->getErrors();
                return View::render('client/edit', ['errors'=>$errors, 'client'=>$data]);
            }
        }else{
            return View::render('error');
        }
    }

    public function delete($data){
        $client = new Client;
        $delete = $client->delete($data['id']);
        if($delete){
            return View::redirect('client');
        }else{
            return View::render('error');
        }
    }
}