<?php
namespace App\Models;
use App\Models\CRUD;

class Manufacturer extends CRUD{

    protected $table = "manufacturer";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'address', 'phone', 'country_of_origin', 'year_of_creation', 'ranking'];
    
} 