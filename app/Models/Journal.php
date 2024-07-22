<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->setAmountBasedOnType();
        });
    }


    public function setAmountBasedOnType()
    {
        if($this->attributes['type'] == 'Debit Cash'){
            $this->attributes['amount'] = $this->shipping->price;
        }elseif ($this->attributes['type'] == 'Credit Revenue' ){
            $this->attributes['amount'] = ($this->shipping->price / 100 ) * 20;
        }elseif ($this->attributes['type'] == 'Credit Payable') {
            $this->attributes['amount'] = ($this->shipping->price / 100 ) * 80;
        }
    }




}
