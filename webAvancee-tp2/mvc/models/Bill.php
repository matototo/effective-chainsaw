<?php
namespace App\Models;
use App\Models\CRUD;

class Bill extends CRUD{

    protected $table = "bill";
    protected $primaryKey = "bill_number";
    protected $fillable = ['bill_date', 'client_id'];
    
} 