<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Privilege;
use App\Models\Logbook;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class LogbookController{

    public function __construct() 
    {
        Auth::session();
    }

    public function index() {
        if($_SESSION['privilege_id']){
            $user = new User;
            $selectUser = $user->select();
            $log = new Logbook;
            $selectLog = $log->select();
            return View::render('log/index', ['users'=>$selectUser, 'log'=>$selectLog]);
        }
        return View::render('error');
    }

}

