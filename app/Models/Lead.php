<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Lead.php
class Lead extends Model
{
    protected $fillable = ['name','email','company','message'];
}