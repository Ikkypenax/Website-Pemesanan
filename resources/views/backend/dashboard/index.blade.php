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
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-info text-white">
                                    Total Pemasukan Tahun ini
                                </div>
                                <div class="card">
                                    <div class="card">
                                        <div class="card-body">
                                            <canvas id="feeYearChart" width="400" height="70"></canvas>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="card-body text-center">
                                    <i class="fas fa-wallet fa-2x text-info"></i>
                                    <h5 class="card-title mt-2 text-dark">Rp
                                        {{ number_format($total_fee_finished, 0, ',', '.') }}</h5>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-primary text-white">
                                    Pesanan Hari Ini
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-calendar-day fa-2x text-dark"></i>
                                    <h5 class="card-title mt-2 text-dark">{{ $total_order_today }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-primary text-white">
                                    Pesanan Bulan Ini
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-calendar-alt fa-2x text-dark"></i>
                                    <h5 class="card-title mt-2 text-dark">{{ $total_order_month }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-primary text-white">
                                    Pesanan Tahun Ini
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-calendar fa-2x text-dark"></i>
                                    <h5 class="card-title mt-2 text-dark">{{ $total_order_year }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-success text-white">
                                    Pesanan yang Disetujui
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-check-circle fa-2x text-success"></i>
                                    <h5 class="card-title mt-2 text-dark">{{ $approved_orders }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-danger text-white">
                                    Pesanan yang Dibatalkan
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-times-circle fa-2x text-danger"></i>
                                    <h5 class="card-title mt-2 text-dark">{{ $cancelled_orders }}</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-content mb-3 shadow">
                                <div class="card-header bg-warning text-white">
                                    Pesanan yang Diproses
                                </div>
                                <div class="card-body text-center">
                                    <i class="fas fa-spinner fa-2x text-warning"></i>
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
                    Jumlah Pesanan Panel Bulan Ini
                </div>

                {{-- Tabel Jumlah Pesanan Barang --}}
                <div class="card-body">
                    <div class="row">

                        @if ($panelType->isEmpty())
                            <p>Tidak ada panel yang terpesan.</p>
                        @else
                            <div class="mytable" style="max-height: 380px; overflow-y: auto; overflow-x: hidden;">
                                <table class="table table-striped" style="width: 100%;">
                                    <thead>
                                        <tr style="background-color: #4B5563; color: white;">
                                            <th scope="col"
                                                style="position: sticky; top: 0; background-color: #4B5563; z-index: 1;">No
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
                                            <td style="position: sticky; bottom: 0; background-color: #4B5563; z-index: 1;">
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
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('feeYearChart').getContext('2d');

            // Data dari controller (total_fee_finished per bulan)
            const feesPerMonth = @json($feesPerMonth);

            // Pisahkan bulan dan nilai fee menjadi dua array
            const labels = Object.keys(feesPerMonth); // ['January', 'February', 'March', ...]
            const data = Object.values(feesPerMonth); // [150000, 200000, 180000, ...]

            // Buat grafik
            const feeYearChart = new Chart(ctx, {
                type: 'line', // Jenis grafik (line, bar, dll.)
                data: {
                    labels: labels, // Bulan
                    datasets: [{
                        label: 'Total Fee (Rp)',
                        data: data, // Data fee
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
                            beginAtZero: true // Y-axis dimulai dari 0
                        }
                    }
                }
            });
        });
    </script>

@endsection
