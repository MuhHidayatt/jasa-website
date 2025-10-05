<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PageController extends Controller
{
    /**
     * Halaman dashboard (hanya untuk user yang sudah login)
     */
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalServices  = Service::count();
        $totalOrders    = Order::count();

        // === Statistik Penjualan (7 bulan terakhir) ===
        $sales = Order::selectRaw('MONTH(order_date) as month, COUNT(*) as total')
            ->where('order_date', '>=', now()->subMonths(6)->startOfMonth())
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months        = [];
        $monthlyOrders = [];

        for ($i = 6; $i >= 0; $i--) {
            $carbonMonth = now()->subMonths($i);
            $monthNumber = (int) $carbonMonth->format('n');
            $monthLabel  = $carbonMonth->format('M');

            $months[] = $monthLabel;

            $data = $sales->firstWhere('month', $monthNumber);
            $monthlyOrders[] = $data ? $data->total : 0;
        }

        // === Aktivitas Terbaru ===
        $activities = collect();

        // Pesanan terbaru
        $latestOrders = Order::with('customer')->latest()->take(3)->get()->map(function ($order) {
            return [
                'text'       => 'Pesanan baru dari <strong>' . ($order->customer->name_customer ?? 'Unknown') . '</strong>',
                'time'       => $order->created_at->diffForHumans(),
                'created_at' => $order->created_at
            ];
        });

        // Pembayaran terbaru
        $latestPayments = Payment::with(['order.customer'])->latest()->take(3)->get()->map(function ($payment) {
            $customerName = $payment->order && $payment->order->customer
                ? $payment->order->customer->name_customer
                : 'Unknown';

            return [
                'text'       => 'Pembayaran dikonfirmasi oleh <strong>' . $customerName . '</strong>',
                'time'       => $payment->created_at->diffForHumans(),
                'created_at' => $payment->created_at
            ];
        });

        // Layanan terbaru
        $latestServices = Service::latest()->take(3)->get()->map(function ($service) {
            return [
                'text'       => 'Layanan <strong>' . $service->name_service . '</strong> ditambahkan',
                'time'       => $service->created_at->diffForHumans(),
                'created_at' => $service->created_at
            ];
        });

        // Gabungkan dan urutkan aktivitas
        $activities = $activities
            ->merge($latestOrders)
            ->merge($latestPayments)
            ->merge($latestServices)
            ->sortByDesc('created_at')
            ->take(5)
            ->values();

        // Kirim ke view
        return view('dashboard.index', compact(
            'totalCustomers',
            'totalServices',
            'totalOrders',
            'months',
            'monthlyOrders',
            'activities'
        ));
    }
}
