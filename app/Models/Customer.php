<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_customer',
        'name_customer',
        'email',
        'phone',
        'address'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->kode_customer)) {
                $model->kode_customer = 'CST' . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
            }
        });
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'kode_customer', 'kode_customer');
    }
}
