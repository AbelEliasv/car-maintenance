<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cars extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'brand',
        'model',
        'year',
        'price',
        'owner_id',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }


    /**
     * Get the post that owns the comment.
     */
    public function history()
    {
        return $this->belongsToMany(Owner::class, 'history_of_owners', 'car_id', 'owner_id')->withPivot('assing_date')->using(HistoryOfOwners::class);
    }
}
