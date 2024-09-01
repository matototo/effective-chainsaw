<?php
namespace App\Models;
use App\Models\CRUD;

class Logbook extends CRUD {
    protected $table = "logbook";
    protected $primaryKey = "id";
    protected $fillable = ['page', 'user_id'];
}