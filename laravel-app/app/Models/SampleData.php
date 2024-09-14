<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleData extends Model
{
    use HasFactory;

    protected $table = 'sample_data';

    protected $fillable = [
        'code',
        'item_id',
        'qty',
        'qty_unit',
        'country_name',
        'item_code',
        'item_desc',
        'product_type',
        'grade',
        'connection',
        'size',
    ];
}
