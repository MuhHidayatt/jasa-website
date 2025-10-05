<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_order',
        'kode_customer',
        'kode_service',
        'is_custom',
        'custom_request',
        'order_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'is_custom' => 'boolean',
        'order_date' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->kode_order)) {
                $model->kode_order = 'ORD' . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
            }
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'kode_customer', 'kode_customer');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'kode_service', 'kode_service');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'kode_order', 'kode_order');
    }
}
