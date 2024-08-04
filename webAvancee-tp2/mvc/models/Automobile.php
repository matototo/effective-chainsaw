<?php
namespace App\Models;
use App\Models\CRUD;

class Automobile extends CRUD{

    protected $table = "automobile";
    protected $primaryKey = "serial_number";
    protected $fillable = ['name', 'year', 'category', 'drive_train', 'type', 'price', 'description', 'manufacturer_id'];
    
} 