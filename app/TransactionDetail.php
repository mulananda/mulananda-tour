<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes; // menggunakan Sofdeletes

class TransactionDetail extends Model
{
    use softDeletes;
    
    //field sesuai table transaction
    protected $fillable = [
        'transaction_id', 'username', 
        'nationality', 'is_visa', 'doe_passport'
    ];

    protected $hidden = [

    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
