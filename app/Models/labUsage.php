<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class labUsage extends Model
{
    use HasFactory;
    protected $fillable = ['adno','time','system','internet','status','registeredby','admittedby','leftedby','registertime','lefttime','admittime','netamount'];
}
