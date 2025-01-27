<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rents;
use App\Models\Orders;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
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

        $selectedYear = $request->get('year', now()->year);
        $years = range(now()->year - 10, now()->year);
        $selectedMonth = $request->get('month', 1);

        // Mengelompokkan dan menghitung panel berdasarkan pesanan (bulan)
        $panel = Orders::with('panel', 'addfee')->whereMonth('created_at', $selectedMonth)
            ->whereYear('created_at', $selectedYear)
            ->get();
        $panelType = $panel->groupBy('panel.type')->map(function ($group) {
            return $group->count();
        });

        // Total fee orders dan rents berdasarkan status "finish"
        $total_fee_orders = Orders::where('status', 'finish')
            ->whereYear('created_at', $selectedYear)
            ->with('addfee')
            ->get()
            ->sum(function ($order) {
                return $order->addfee->fee_total ?? 0;
            });

        $total_fee_rents = Rents::where('status', 'finish')
            ->whereYear('created_at', $selectedYear)
            ->with('feerent')
            ->get()
            ->sum(function ($rent) {
                return $rent->feerent->fee_total ?? 0;
            });

        $total_fee_finished = $total_fee_orders + $total_fee_rents;

        // Data per bulan untuk Orders
        $ordersFeesPerMonth = Orders::whereYear('created_at', $selectedYear)
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

        // Data per bulan untuk Rents
        $rentsFeesPerMonth = Rents::whereYear('created_at', $selectedYear)
            ->where('status', 'finish')
            ->with('feerent')
            ->get()
            ->groupBy(function ($rent) {
                return Carbon::parse($rent->created_at)->format('F');
            })
            ->map(function ($rents) {
                return $rents->sum(function ($rent) {
                    return $rent->feerent->fee_total ?? 0;
                });
            });

        // Gabungkan data Orders dan Rents
        $feesPerMonth = array_fill_keys($months, 0);

        foreach ($months as $month) {
            $feesPerMonth[$month] =
                ($ordersFeesPerMonth[$month] ?? 0) +
                ($rentsFeesPerMonth[$month] ?? 0);
        }

        // Menghitung jumlah pesanan berdasarkan waktu (tahun, bulan, hari ini)
        $total_orders_year = Orders::whereYear('created_at', $selectedYear)->count();
        $total_rents_year = Rents::whereYear('created_at', $selectedYear)->count();
        $total_order_year = $total_orders_year + $total_rents_year;

        $total_orders_month = Orders::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $total_rents_month = Rents::whereYear('created_at', $selectedYear)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $total_order_month = $total_orders_month + $total_rents_month;

        $total_orders_today = Orders::whereYear('created_at', $selectedYear)
            ->whereDate('created_at', Carbon::now()->toDateString())
            ->count();
        $total_rents_today = Rents::whereYear('created_at', $selectedYear)
            ->whereDate('created_at', Carbon::now()->toDateString())
            ->count();
        $total_order_today = $total_orders_today + $total_rents_today;

        // Menghitung jumlah pesanan berdasarkan status (berdasarkan tahun yang dipilih)
        $approved_order = Orders::whereYear('created_at', $selectedYear)
            ->where('status', 'approve')
            ->count();
        $approved_rent = Rents::whereYear('created_at', $selectedYear)
            ->where('status', 'approve')
            ->count();
        $approved_orders = $approved_order + $approved_rent;

        $cancelled_order = Orders::whereYear('created_at', $selectedYear)
            ->where('status', 'reject')
            ->count();
        $cancelled_rent = Rents::whereYear('created_at', $selectedYear)
            ->where('status', 'reject')
            ->count();
        $cancelled_orders = $cancelled_order + $cancelled_rent;

        $processing_order = Orders::whereYear('created_at', $selectedYear)
            ->where('status', 'prosses')
            ->count();
        $processing_rent = Rents::whereYear('created_at', $selectedYear)
            ->where('status', 'prosses')
            ->count();
        $processing_orders = $processing_order + $processing_rent;


        return view('backend.dashboard.index', compact(
            'total_order_year',
            'total_order_month',
            'total_order_today',
            'approved_orders',
            'cancelled_orders',
            'processing_orders',
            'total_fee_orders',
            'total_fee_rents',
            'total_fee_finished',
            'feesPerMonth',
            'total_orders_month',
            'total_rents_month',
            'total_orders_year',
            'total_rents_year',
            'total_orders_today',
            'total_rents_today',
            'approved_order',
            'approved_rent',
            'cancelled_order',
            'cancelled_rent',
            'processing_order',
            'processing_rent',
            'panelType',
            'selectedYear',
            'selectedMonth',
            'years',
            'months',
        ));
    }
}
