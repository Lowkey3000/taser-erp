<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Plan.php
class Plan extends Model
{
    protected $fillable = ['name','slug','description','price_monthly','price_yearly','features','is_featured','is_active'];
    protected $casts = ['features' => 'array', 'is_featured' => 'boolean', 'is_active' => 'boolean'];
}


