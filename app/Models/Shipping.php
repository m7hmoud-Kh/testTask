<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    public const PATH_SHIPPING = '/assets/Shipping/';
    public const DISK_NAME = 'shipping';

    protected $fillable = ['code','shipper', 'weight', 'price','status','image','description'];


    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->setPriceBasedOnWeight();
        });
    }

    public function setPriceBasedOnWeight()
    {
        if($this->attributes['weight'] >= 1 && $this->attributes['weight'] <= 10){
            $this->attributes['price'] = 10;
        }elseif ($this->attributes['weight'] >= 10 && $this->attributes['weight'] <= 25){
            $this->attributes['price'] = 100;
        }elseif ($this->attributes['weight'] > 25) {
            $this->attributes['price'] = 300;
        }
    }

    public function getImageAttribute($value)
    {
        return self::PATH_SHIPPING . $value;
    }
}
