<?php
namespace App\Controllers;

use App\Models\Automobile;
use App\Providers\View;
use App\Providers\Validator;

class AutomobileController{
    public function index() {
        $automobile = new Automobile;
        $select = $automobile->select();
        View::render('automobile/index', ['automobiles' =>$select]);
    }
}