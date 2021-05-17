<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challan extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     */

    protected $table = 'challans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'customer_id',
        'amount',
        'date',
        'remarks'
    ];

    public function master() {
        return $this->belongsTo(Master::class,'customer_id');
    }

    public function items() {
        return $this->hasMany(Item::class,'challan_id');
    }
}
