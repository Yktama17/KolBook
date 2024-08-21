<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';  
    protected $primaryKey = 'ID';  

    public function collections()
    {
        return $this->hasMany(Collection::class, 'Status_id', 'ID');
    }
}

