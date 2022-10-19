<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Intl\Countries;

class OrderAddress extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id', 'type', 'country', 'first_name', 'last_name',
        'company_name', 'street_address', 'home_place', 'city',
        'state', 'post_code', 'email', 'phone_number', 'notes'
    ];


    public function getNameAttribute(){

        return $this->first_name . ' ' . $this->last_name;
    }

    public function getCountryNameAttribute(){

        return Countries::getName($this->country);
    }
}
