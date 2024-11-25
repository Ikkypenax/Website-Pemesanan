<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $feesPerMonth = Orders::whereYear('created_at', Carbon::now()->year)
            ->where('status', 'finish')
            ->with('addfee')
            ->get()
            ->groupBy(function ($order) {
                return Carbon::parse($order->created_at)->format('F');
            })
            ->map(function ($orders) {
                return $orders->sum(function ($order) {
                    return $order->addfee->fee_total ?? 0;
                });
            });

        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $feesPerMonth = array_merge(
            array_fill_keys($months, 0),
            $feesPerMonth->toArray()
        );

        // Menghitung jumlah pesanan berdasarkan waktu yang berjalan tahun, bulan, hari ini
        $total_order_year = Orders::whereYear('created_at', Carbon::now()->year)->count();
        $total_order_month = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $total_order_today = Orders::whereDate('created_at', Carbon::now()->toDateString())->count();

        // Menghitung jumlah pesanan berdasarkan status 
        $approved_orders = Orders::where('status', 'approve')->count();
        $cancelled_orders = Orders::where('status', 'reject')->count();
        $processing_orders = Orders::where('status', 'prosses')->count();

        // Mengelompokkan dan menghitung panel berdasarkan pesanan 
        $panel = Orders::with('panel', 'addfee')->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get();
        $panelType = $panel->groupBy('panel.type')->map(function ($group) {
            return $group->count();
        });

        $total_fee_finished = Orders::where('status', 'finish')
            ->with('addfee')
            ->get()
            ->sum(function ($order) {
                return $order->addfee->fee_total ?? 0;
            });

        return view('backend.dashboard.index', compact(
            'total_order_year',
            'total_order_month',
            'total_order_today',
            'approved_orders',
            'cancelled_orders',
            'processing_orders',
            'panelType',
            'total_fee_finished',
            'feesPerMonth'
        ));
    }
}
