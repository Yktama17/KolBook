<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations'; 
    protected $primaryKey = 'ID';

    public function location()
    {
        return $this->hasMany(Location::class, 'Location_id', 'ID');
    }
    
}



