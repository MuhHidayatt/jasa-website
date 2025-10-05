<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice - {{ $order->kode_order }}</title>
    <style>
        :root {
            --primary: #0056b3;
            --gray-light: #f8f9fa;
            --text-color: #333;
            --border-color: #ddd;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            color: var(--text-color);
            margin: 0;
            padding: 40px;
            background: #ffffff;
        }

        .invoice-container {
            max-width: 800px;
            margin: auto;
            border: 1px solid var(--border-color);
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }

        .company-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .company-header h1 {
            color: var(--primary);
            font-size: 28px;
            margin-bottom: 5px;
        }

        .company-header small {
            font-size: 12px;
            color: #666;
        }

        .invoice-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-title h2 {
            margin: 0;
            font-size: 24px;
            color: var(--primary);
        }

        .info-section, .table-section {
            margin-top: 20px;
        }

        .info-section table {
            width: 100%;
            line-height: 1.6;
        }

        .info-section td {
            padding: 4px 0;
        }

        .table-section table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table-section th, .table-section td {
            border: 1px solid var(--border-color);
            padding: 10px;
            text-align: left;
        }

        .table-section th {
            background-color: var(--gray-light);
        }

        .text-right { text-align: right; }
        .text-center { text-align: center; }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 12px;
            border-radius: 4px;
            color: #fff;
        }

        .badge.pending { background-color: #ffc107; }
        .badge.paid { background-color: #0d6efd; }
        .badge.done { background-color: #198754; }

        .total-box {
            margin-top: 20px;
            text-align: right;
            font-size: 16px;
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }

        .logo {
            max-width: 100px;
            margin-bottom: 10px;
        }

        hr {
            border: none;
            border-top: 2px solid var(--primary);
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="company-header">
            {{-- Logo (jika ada) --}}
            {{-- <img src="{{ asset('images/logo-webcraft.png') }}" class="logo" alt="WebCraft Studio"> --}}
            <h1>WebCraft Studio</h1>
            <small>Solusi Web & Digital Profesional</small>
        </div>

        <div class="invoice-title">
            <h2>INVOICE</h2>
            <p><strong>Kode Order:</strong> {{ $order->kode_order }}</p>
        </div>

        <div class="info-section">
            <table>
                <tr>
                    <td><strong>Nama Customer</strong></td>
                    <td>: {{ $order->customer->name_customer }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>: {{ $order->customer->email ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>No. Telepon</strong></td>
                    <td>: {{ $order->customer->phone ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Alamat</strong></td>
                    <td>: {{ $order->customer->address ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Order</strong></td>
                    <td>: {{ $order->order_date->format('d-m-Y') }}</td>
                </tr>
            </table>
        </div>

        <hr>

        <div class="table-section">
            <h4>Detail Layanan</h4>
            <table>
                <thead>
                    <tr>
                        <th>Deskripsi</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->is_custom ? $order->custom_request : ($order->service->name_service ?? '-') }}</td>
                        <td>{{ $order->is_custom ? 'Custom' : 'Standar' }}</td>
                        <td>Rp {{ number_format($order->service->price ?? 0, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $order->payment->status ?? 'pending' }}">
                                {{ ucfirst($order->payment->status ?? 'Belum Dibayar') }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if($order->payment)
        <div class="table-section">
            <h4>Detail Pembayaran</h4>
            <table>
                <thead>
                    <tr>
                        <th>Tanggal Bayar</th>
                        <th>Metode</th>
                        <th>Status</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->payment->payment_date->format('d-m-Y') }}</td>
                        <td>{{ ucfirst($order->payment->method) }}</td>
                        <td>{{ ucfirst($order->payment->status) }}</td>
                        <td>Rp {{ number_format($order->payment->amount, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

        <div class="total-box">
            Total Dibayar: Rp {{ number_format($order->payment->amount ?? 0, 0, ',', '.') }}
        </div>

        <div class="footer">
            <p>Terima kasih telah mempercayakan proyek Anda kepada WebCraft Studio.</p>
            <p>Invoice ini dibuat otomatis pada {{ now()->format('d-m-Y H:i') }}</p>
        </div>
    </div>
</body>
</html>
