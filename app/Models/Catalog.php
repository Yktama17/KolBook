<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalogs';
    protected $primaryKey = 'ID';

    public function collections()
    {
        return $this->hasMany(Collection::class, 'Catalog_id', 'ID');
    }

    // Relasi dengan Ruas (MARC)
    public function MARC()
    {
        return $this->hasMany(MARC::class, 'catalog_ruas', 'ID');
    }
}
