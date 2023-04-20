<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    protected $table = 'sales';
    //可変項目
    protected $fillable = 
    [
        'product_id',
        'created_at',
        'updated_at'
        
    ];

}
