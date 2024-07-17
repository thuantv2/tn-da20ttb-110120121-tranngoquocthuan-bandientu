<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Statistical;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;
class StatisticalController extends Controller
{
    public function days_order()
    {
        $sub60days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(60)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $data = Statistical::whereBetween('order_date', [$sub60days, $now])
            ->orderBy('order_date', 'ASC')
            ->get();

        $chart_data = [];
        foreach ($data as $key => $val) {
            $chart_data[] = [
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            ];
        }

        return response()->json($chart_data);
    }

    public function dashboard_filter(Request $request)
    {
        $data = $request->all();
        
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $dauthang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(1)->startOfMonth()->toDateString();
        $cuoithang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(1)->endOfMonth()->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    
        $dateRanges = [
            '7ngay' => [$sub7days, $now],
            'thangtruoc' => [$dau_thangtruoc, $cuoi_thangtruoc],
            'thangnay' => [$dauthangnay, $now],
            'thang9' => [$dauthang9, $cuoithang9],
            'macdinh' => [$sub365days, $now]
        ];
    
        $dashboardValue = $data['dashboard_value'] ?? 'macdinh';
        $dateRange = $dateRanges[$dashboardValue] ?? $dateRanges['macdinh'];
    
        $get = Statistical::whereBetween('order_date', $dateRange)
            ->orderBy('order_date', 'ASC')
            ->get();
    
        $chart_data = [];
        foreach ($get as $key => $val) {
            $chart_data[] = [
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            ];
        }
    
        echo json_encode($chart_data);
    }


    public function filter_by_date(Request $request)
    {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Statistical::whereBetween('order_date', [$from_date, $to_date])
            ->orderBy('order_date', 'ASC')
            ->get();

        $chart_data = [];
        foreach ($get as $key => $val) {
            $chart_data[] = [
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            ];
        }

        return response()->json($chart_data);
    }

    
    
}
