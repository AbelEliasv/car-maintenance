<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class HistoryOfOwners extends Pivot
{
    use HasFactory;

     /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
    'assing_date',
    'car_id',
    'owner_id',
];
}
