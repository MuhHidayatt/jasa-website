<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_service',
        'name_service',
        'description',
        'price',
        'duration',
        'foto'
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->kode_service)) {
                $model->kode_service = 'SRV' . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
            }
        });
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'kode_service', 'kode_service');
    }
}
