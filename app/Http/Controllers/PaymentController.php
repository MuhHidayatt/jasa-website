<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Menampilkan daftar pembayaran.
     */
    public function index()
    {
        $payments = Payment::with(['order.customer'])->orderBy('payment_date', 'desc')->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Menampilkan form pembayaran untuk 1 order.
     */
    public function create($orderId)
    {
        // Ambil order berdasarkan ID (bukan collection)
        $order = Order::with('customer')->findOrFail($orderId);

        // Kirim data order ke view
        return view('payments.create', compact('order'));
    }

    /**
     * Simpan data pembayaran baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_order'    => 'required|exists:orders,kode_order',
            'payment_date'  => 'required|date',
            'amount'        => 'required|numeric|min:0',
            'method'        => 'required|string',
        ]);

        // Simpan data pembayaran
        $payment = Payment::create([
            'kode_order'   => $request->kode_order,
            'payment_date' => $request->payment_date,
            'amount'       => $request->amount,
            'method'       => $request->method,
            'status'       => 'paid', // otomatis success
        ]);

        // Update status order jadi 'paid'
        $order = Order::where('kode_order', $request->kode_order)->first();
        if ($order && $order->status === 'pending') {
            $order->status = 'paid';
            $order->save();
        }

        return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pembayaran.
     */
    public function show($id)
    {
        $payment = Payment::with(['order.customer'])->findOrFail($id);
        return view('payments.show', compact('payment'));
    }
}
