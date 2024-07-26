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
}