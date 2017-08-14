<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{

	protected $table = 'heroes';
    protected $fillable = [
        'name', 
        'class',
        'health', 
        'atack', 
        'speed', 
        'luck' 
    ];
    
}
