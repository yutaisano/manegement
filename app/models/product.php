<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //テーブル名
    protected $table = 'products';

    //可変項目
    protected $fillable = 
    [
        'id',
        'img',
        'product_name',
        'price',
        'stocks',
        'comment'
        
    ];
}
