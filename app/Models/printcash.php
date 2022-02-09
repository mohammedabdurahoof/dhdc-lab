<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class printcash extends Model
{
    use HasFactory;
    protected $fillable = ['adno','amount','addedby'];
}
