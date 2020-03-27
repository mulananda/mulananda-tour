<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes; // menggunakan Sofdeletes

class Transaction extends Model
{
    use softDeletes;
    
    //field sesuai table transaction
    protected $fillable = [
        'travel_packages_id', 'user_id', 
        'additional_visa', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [

    ];

    // membuat 3 relasi table
    public function details(){
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }
    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // end 3 relasi
}
