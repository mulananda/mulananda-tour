<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes; // menggunakan Sofdeletes

class Gallery extends Model
{
    use softDeletes;
    
    protected $fillable = [
        'travel_packages_id', 'image'
    ];

    protected $hidden = [

    ];

    // membuat relasi gallery ke travelpackages
    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }
}
