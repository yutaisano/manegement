<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class product extends Model
{
    use Sortable;
    //テーブル名
    protected $table = 'products';

    //可変項目
    protected $fillable = 
    [
        'id',
        'img_path',
        'product_name',
        'price',
        'stocks',
        'company',
        'comment',
        'created_at',
        'updated_at'
        
    ];

    public $sortable = [
        'id',
        'img_path',
        'product_name',
        'price',
        'stocks',
        'company',
        'comment'
    ];
}
