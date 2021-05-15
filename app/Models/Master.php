<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masters extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     */

    protected $table = 'masters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'prefix',
        'address',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(Masters::class, 'user_id');
    }

    public function challans() {
        return $this->hasMany(Challan::class,'customer_id');
    }
}
