<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    //
    //テーブル名
    protected $table = 'companies';

    //可変項目
    protected $fillable = 
    [
        'company_name',
        'street_address',
        'Representative_name',
        'created_at',
        'updateed_at'
        
    ];
}
