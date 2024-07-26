<?php
namespace App\Models;
use App\Models\CRUD;

class AutomobileBill extends CRUD{

    protected $table = "automobile_bill";
    protected $primaryKey = "id";
    protected $fillable = ['total', 'qt', 'serial_number', 'bill_number'];
    
} 