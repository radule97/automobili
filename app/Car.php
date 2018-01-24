<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable = ['car_name', 'car_price', 'car_year', 'car_mileage', 'car_price', 'car_img', 'status'];
    public function category(){
        $this->hasOne('App\Category');
    }

}
