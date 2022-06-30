<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consumer extends Model
{
    use SoftDeletes;

    protected $table = 'consumers';
    protected $fillable =
    [
        'personal_account',
        'full_name',
        'district',
        'street',
        'house',
        'building',
        'apartment',
        'model',
        'number',
        'verif_date',
        'seal',
        'year_release',
        'day_zone',
        'crawl_date',
        'reading',
        'note',
        'photo',
        'file',
        'area_id'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
