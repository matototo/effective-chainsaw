<?php
use App\Models\Logbook;
session_start();
require_once('vendor/autoload.php');
require_once('config.php');
require_once('routes/web.php');
$log = new Logbook;
if($_SESSION){
    $data = ['page'=>$_SERVER['PATH_TRANSLATED'], 'user_id'=>$_SESSION['user_id']];
}else{
    $data = ['page'=>$_SERVER['PATH_TRANSLATED'], 'user_id'=>2];
}
$log->insert($data);

// REMOTE_ADDR
// PATH_TRANSLATED
// HTTP_REFERER
// REQUEST_URI
// SCRIPT_FILENAME