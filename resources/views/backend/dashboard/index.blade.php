@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h2 class="mb-4 font-weight-bold text-primary">Dashboard</h2>
    <div class="row">

        <!-- Card Informasi Jumlah Pesanan -->
        <div class="col-12 col-md-12 mb-4">
            <div class="card shadow h-100">
                <div class="card-header bg-primary text-white h5">
                    Informasi Pesanan
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            {{-- Total pemasukan tahun ini --}}
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-info text-white">
                                    Total Pemasukan Tahun: {{ $selectedYear }}
                                </div>
                                <div class="card border-0">
                                    <div class="form-group">
                                        <select id="yearSelect" style="margin-left: 21px; margin-top: 10px">
                                            @foreach ($years as $year)
                                                <option value="{{ $year }}"
                                                    {{ $year == $selectedYear ? 'selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="card border-0">
                                        <div class="card-body">
                                            <canvas id="feeYearChart" width="400" height="70"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body text-center">
                                    <i class="fas fa-wallet fa-2x text-info" data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Pesanan: Rp. {{ number_format($total_fee_orders, 0, ',', '.') }}; Sewa: Rp. {{ number_format($total_fee_rents, 0, ',', '.') }}"></i>
                                    <h5 class="card-title mt-2 text-dark">Rp
                                        {{ number_format($total_fee_finished, 0, ',', '.') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- Pesanan hari ini --}}
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-primary text-white">
                                    Pesanan Hari Ini
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-calendar-day fa-2x text-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Pesanan: {{ $total_orders_today }}, Sewa: {{ $total_rents_today }}"></i>
                                    <h5 class="card-title mt-2 text-dark">{{ $total_order_today }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- Pesanan bulan ini --}}
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-primary text-white">
                                    Pesanan Bulan Ini
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-calendar-alt fa-2x text-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Pesanan: {{ $total_orders_month }}, Sewa: {{ $total_rents_month }}"></i>
                                    <h5 class="card-title mt-2 text-dark">{{ $total_order_month }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- Pesanan tahun ini --}}
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-primary text-white">
                                    Pesanan Tahun Ini
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-calendar fa-2x text-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Pesanan: {{ $total_orders_year }}, Sewa: {{ $total_rents_year }}"></i>
                                    <h5 class="card-title mt-2 text-dark">{{ $total_order_year }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- Pesanan approve --}}
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-success text-white">
                                    Pesanan yang Disetujui
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-check-circle fa-2x text-success" data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Pesanan: {{ $approved_order }}, Sewa: {{ $approved_rent }}"></i>
                                    <h5 class="card-title mt-2 text-dark">{{ $approved_orders }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- Pesanan cancel --}}
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-danger text-white">
                                    Pesanan yang Dibatalkan
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-times-circle fa-2x text-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Pesanan: {{ $cancelled_order }}, Sewa: {{ $cancelled_rent }}"></i>
                                    <h5 class="card-title mt-2 text-dark">{{ $cancelled_orders }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- Pesanan proses --}}
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-warning text-white">
                                    Pesanan yang Diproses
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-spinner fa-2x text-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="Pesanan: {{ $processing_order }}, Sewa: {{ $processing_rent }}"></i>
                                    <h5 class="card-title mt-2 text-dark">{{ $processing_orders }}</h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Pesanan Barang -->
        <div class="col-12 col-md-12 mb-4">
            <div class="card shadow h-100">
                <div class="card-header bg-primary text-white h5">
                    Jumlah Pesanan Panel Bulan: {{ $months[$selectedMonth - 1] }}
                </div>

                {{-- Tabel Jumlah Pesanan Barang --}}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group">
                            <select id="monthSelect">
                                @foreach ($months as $index => $month)
                                    <option value="{{ $index + 1 }}"
                                        {{ $index + 1 == $selectedMonth ? 'selected' : '' }}>
                                        {{ $month }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @if ($panelType->isEmpty())
                            <p>Tidak ada panel yang terpesan pada tahun {{ $selectedYear }} bulan {{ $months[$selectedMonth - 1] }}.</p>
                        @else
                            <div class="mytable" style="max-height: 380px; overflow-y: auto; overflow-x: hidden;">
                                <table class="table table-striped" style="width: 100%;">
                                    <thead>
                                        <tr style="background-color: #4B5563; color: white;">
                                            <th scope="col"
                                                style="position: sticky; top: 0; background-color: #4B5563; z-index: 1;">
                                                No
                                            </th>
                                            <th scope="col"
                                                style="position: sticky; top: 0; background-color: #4B5563; z-index: 1;">
                                                Panel
                                            </th>
                                            <th scope="col"
                                                style="position: sticky; top: 0; background-color: #4B5563; z-index: 1;">
                                                Jumlah
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($panelType as $type => $count)
                                            <tr>
                                                <td style="">{{ $loop->iteration }}</td>
                                                <td>{{ $type }}</td>
                                                <td>{{ $count }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr style="background-color: #4B5563; color: white;">
                                            <td colspan="2"
                                                style="position: sticky; bottom: 0; background-color: #4B5563; z-index: 1;">
                                                <strong>Total</strong>
                                            </td>
                                            <td
                                                style="position: sticky; bottom: 0; background-color: #4B5563; z-index: 1;">
                                                <strong>{{ $panelType->sum() }}</strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        /* Card Pesanan */
        .card-content {
            transition: transform 0.2s;

        }

        .card-content:hover {
            transform: scale(1.05);

        }

        /* Tabel pesanan panel */
        .table tbody tr {
            transition: transform 0.2s;

        }

        .table tbody tr:hover {
            transform: scale(1.02);
            background-color: rgba(15, 219, 251, 0.671);
        }
    </style>

    <script>
        document.getElementById('yearSelect').addEventListener('change', function() {
            const selectedYear = this.value;
            const url = new URL(window.location.href);
            url.searchParams.set('year', selectedYear);
            url.searchParams.set('month', 1);
            window.location.href = url.toString();
        });

        document.getElementById('monthSelect').addEventListener('change', function() {
            const selectedMonth = this.value;
            const url = new URL(window.location.href);
            url.searchParams.set('month', selectedMonth);
            window.location.href = url.toString();
        });


        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('feeYearChart').getContext('2d');

            // Data dari controller (total_fee_finished per bulan)
            const feesPerMonth = @json($feesPerMonth);

            // Pisahkan bulan dan nilai fee menjadi dua array
            const labels = Object.keys(feesPerMonth); // ['January', 'February', 'March', ...]
            const data = Object.values(feesPerMonth); // [150000, 200000, 180000, ...]

            // Dapatkan tahun yang dipilih dari server
            const selectedYear = @json($selectedYear);

            // Buat grafik
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: `Tahun ${selectedYear}`,
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: true,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });


        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>

@endsection
