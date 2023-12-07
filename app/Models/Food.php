<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Food extends Model
{
    protected $fillable = ['product', 'fat_100g','protein_100g','carbs_100g','calories_100g']; 
}

