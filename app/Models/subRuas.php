<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subruas extends Model
{
    use HasFactory;

    protected $table = 'catalog_subruas';
    protected $primaryKey = 'ID';

    // Relasi balik ke model Ruas
    public function ruas()
    {
        return $this->belongsTo(MARC::class, 'catalog_subruas', 'ID');
    }
}