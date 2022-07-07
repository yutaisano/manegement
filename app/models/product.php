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
        'company_id',
        'img_path',
        'product_name',
        'price',
        'stocks',
        'company',
        'comment'
        
    ];
}
