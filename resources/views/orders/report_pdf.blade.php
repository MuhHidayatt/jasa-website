<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Order - WebCraft Studio</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            color: #333;
            margin: 40px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
        }

        .report-title {
            font-size: 16px;
            margin-top: 5px;
            color: #555;
        }

        .info {
            margin-top: 10px;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 11.5px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 7px 10px;
            vertical-align: top;
        }

        th {
            background-color: #f4f4f4;
            text-align: center;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #fbfbfb;
        }

        .badge {
            display: inline-block;
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            color: #fff;
        }

        .badge.pending { background-color: #f0ad4e; }
        .badge.paid { background-color: #0275d8; }
        .badge.done { background-color: #5cb85c; }

        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .gray-text { color: #888; }

        .footer {
            margin-top: 40px;
            font-size: 11px;
            text-align: right;
            color: #666;
        }
    </style>
</head>
<body>

    <header>
        <div class="company-name">WebCraft Studio</div>
        <div class="report-title">Laporan Data Order</div>
    </header>

    <div class="info">
        <strong>Status:</strong> {{ $status ? ucfirst($status) : 'Semua' }} <br>
        <strong>Tanggal Dicetak:</strong> {{ now()->format('d/m/Y H:i') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Order</th>
                <th>Customer</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Layanan / Request</th>
                <th>Status</th>
                <th>Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $order->kode_order }}</td>
                    <td>{{ $order->customer->name_customer }}</td>
                    <td class="text-center">{{ $order->order_date->format('d/m/Y') }}</td>
                    <td class="text-center">{{ $order->is_custom ? 'Custom' : 'Standar' }}</td>
                    <td>{{ $order->is_custom ? $order->custom_request : ($order->service->name_service ?? '-') }}</td>
                    <td class="text-center">
                        <span class="badge {{ $order->status }}">
                            {{ strtoupper($order->status) }}
                        </span>
                    </td>
                    <td>
                        @if(in_array($order->status, ['paid', 'done']) && $order->payment)
                            <div>
                                <strong>Total:</strong> Rp {{ number_format($order->payment->amount, 0, ',', '.') }}<br>
                                <strong>Metode:</strong> {{ ucfirst($order->payment->method) }}<br>
                                <strong>Tgl Bayar:</strong> {{ \Carbon\Carbon::parse($order->payment->payment_date)->format('d/m/Y') }}
                            </div>
                        @else
                            <span class="gray-text">Belum dibayar</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center gray-text">Tidak ada data order.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        &copy; {{ now()->year }} WebCraft Studio • Generated automatically
    </div>

</body>
</html>
