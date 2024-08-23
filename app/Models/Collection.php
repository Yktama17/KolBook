<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $table = 'collections';
    protected $primaryKey = 'ID';

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'Catalog_id', 'ID');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'Location_id', 'ID');
    }
    
}

