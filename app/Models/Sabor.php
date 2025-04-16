<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sabor extends Model
{
    protected $table = 'sabores';
    
    protected $fillable = ['nome', 'descricao'];
    

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }
}