<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'birthday',
        'gender', 'country', 'postal_code', 'state', 'city',
        'street_address', 'locale'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
