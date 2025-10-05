<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Payment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar order dengan filter dan pencarian.
     */
    public function index(Request $request)
    {
        $orders = Order::with(['customer', 'service'])
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->when($request->search, function ($q, $search) {
                $q->whereHas('customer', function ($q2) use ($search) {
                    $q2->where('name_customer', 'like', '%' . $search . '%');
                })->orWhere('kode_order', 'like', '%' . $search . '%');
            })
            ->when($request->sort, function ($q, $sort) {
                switch ($sort) {
                    case 'latest':
                        return $q->orderBy('order_date', 'desc');
                    case 'oldest':
                        return $q->orderBy('order_date', 'asc');
                    case 'name_asc':
                        return $q->orderBy(Customer::select('name_customer')
                            ->whereColumn('customers.kode_customer', 'orders.kode_customer'), 'asc');
                    case 'name_desc':
                        return $q->orderBy(Customer::select('name_customer')
                            ->whereColumn('customers.kode_customer', 'orders.kode_customer'), 'desc');
                    default:
                        return $q;
                }
            }, fn($q) => $q->orderBy('created_at', 'desc')) // default sort
            ->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Tampilkan form tambah order.
     */
    public function create()
    {
        $customers = Customer::orderBy('name_customer')->get();
        $services = Service::orderBy('name_service')->get();
        return view('orders.create', compact('customers', 'services'));
    }

    /**
     * Simpan order baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_customer'  => 'required|exists:customers,kode_customer',
            'is_custom'      => 'required|in:0,1',
            'kode_service'   => 'required_if:is_custom,0|nullable|exists:services,kode_service',
            'custom_request' => 'required_if:is_custom,1|nullable|string',
            'order_date'     => 'required|date',
            'notes'          => 'nullable|string',
        ]);

        Order::create([
            'kode_customer'  => $request->kode_customer,
            'is_custom'      => $request->is_custom,
            'kode_service'   => $request->is_custom ? null : $request->kode_service,
            'custom_request' => $request->is_custom ? $request->custom_request : null,
            'order_date'     => $request->order_date,
            'status'         => 'pending',
            'notes'          => $request->notes,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail order.
     */
    public function show($id)
    {
        $order = Order::with(['customer', 'service', 'payment'])->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    /**
     * Tampilkan form edit.
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $customers = Customer::orderBy('name_customer')->get();
        $services = Service::orderBy('name_service')->get();
        return view('orders.edit', compact('order', 'customers', 'services'));
    }

    /**
     * Update order.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'kode_customer'  => 'required|exists:customers,kode_customer',
            'is_custom'      => 'required|in:0,1',
            'kode_service'   => 'required_if:is_custom,0|nullable|exists:services,kode_service',
            'custom_request' => 'required_if:is_custom,1|nullable|string',
            'order_date'     => 'required|date',
            'notes'          => 'nullable|string',
        ]);

        $order->update([
            'kode_customer'  => $request->kode_customer,
            'is_custom'      => $request->is_custom,
            'kode_service'   => $request->is_custom ? null : $request->kode_service,
            'custom_request' => $request->is_custom ? $request->custom_request : null,
            'order_date'     => $request->order_date,
            'notes'          => $request->notes,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order berhasil diperbarui.');
    }

    /**
     * Hapus order.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus.');
    }

    /**
     * Tandai order sebagai selesai.
     */
    public function markAsDone(Order $order)
    {
        if ($order->status === 'paid') {
            $order->update(['status' => 'done']);
            return redirect()->back()->with('success', 'Order berhasil ditandai selesai.');
        }

        return redirect()->back()->with('error', 'Order belum dibayar dan tidak bisa diselesaikan.');
    }

    /**
     * Menampilkan halaman invoice.
     */
    public function invoice($id)
    {
        $order = Order::with(['customer', 'service', 'payment'])->findOrFail($id);
        return view('orders.invoice', compact('order'));
    }

    /**
     * ✅ Cetak invoice sebagai PDF.
     */
    public function invoicePdf($id)
    {
        $order = Order::with(['customer', 'service', 'payment'])->findOrFail($id);
        $pdf = Pdf::loadView('orders.invoice_pdf', compact('order'));
        return $pdf->stream("Invoice-{$order->kode_order}.pdf");
    }

    /**
     * Tampilkan halaman laporan order.
     */
    public function report(Request $request)
    {
        $status = $request->get('status');
        $orders = Order::with(['customer', 'service'])
            ->when($status, fn($q) => $q->where('status', $status))
            ->orderBy('order_date', 'desc')
            ->get();

        return view('orders.report', compact('orders', 'status'));
    }

    /**
     * Cetak laporan order sebagai PDF.
     */
    public function reportPdf(Request $request)
    {
        $status = $request->get('status');
        $orders = Order::with(['customer', 'service'])
            ->when($status, fn($q) => $q->where('status', $status))
            ->orderBy('order_date', 'desc')
            ->get();

        $pdf = Pdf::loadView('orders.report_pdf', compact('orders', 'status'));
        return $pdf->stream('Laporan-Order-' . ($status ?? 'Semua') . '.pdf');
    }
}
