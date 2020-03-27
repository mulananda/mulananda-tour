<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes; // menggunakan Sofdeletes

class TravelPackage extends Model
{
    use softDeletes;
    
    protected $fillable = [
        'title', 'slug', 'location', 'about', 'featured_event',
        'language', 'foods', 'departure_date', 'duration', 
        'type', 'price'
    ];

    protected $hidden = [

    ];

    // membuat relasi foreign key -> travel_packages_id
    // local key id
    public function galleries(){
        return $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
    }
}
