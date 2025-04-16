<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = ['nome', 'ingredientes', 'preco', 'foto'];

    public function sabores()
    {
        return $this->belongsToMany(Sabor::class);
    }
}