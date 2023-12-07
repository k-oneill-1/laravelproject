<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyRecord extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'record_date', 'protein', 'carbs', 'calories', 'fat'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}





