<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_payment',
        'kode_order',
        'payment_date',
        'amount',
        'method',
        'status'
    ];

    protected $casts = [
        'payment_date' => 'date',
        'amount' => 'decimal:2',
    ];

    /**
     * Generate kode_payment otomatis saat create
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->kode_payment)) {
                $model->kode_payment = 'PAY' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
            }
        });
    }

    /**
     * Relasi ke Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'kode_order', 'kode_order');
    }

    /**
     * Relasi ke Customer (melalui Order)
     */
    public function customer()
    {
        return $this->hasOneThrough(
            Customer::class,
            Order::class,
            'kode_order',    // Foreign key di tabel orders
            'kode_customer',            // Primary key di tabel customers
            'kode_order',    // Local key di tabel payments
            'kode_customer'    // Foreign key di tabel orders
        );
    }
}
