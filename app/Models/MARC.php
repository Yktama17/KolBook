<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MARC extends Model
{
    use HasFactory;

    protected $table = 'catalog_ruas';
    protected $primaryKey = 'ID';
    
    // Relasi dengan model Subruas
    public function subruas()
    {
        return $this->hasMany(Subruas::class, 'catalog_ruas', 'ID');
    }
}