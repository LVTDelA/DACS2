<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.manage.index');
    }

    public function getDataLineCharts(Request $request)
    {
//        if ($request->ajax()) { lay data = ajax

        $statisticsBy = $request->statisticsBy ?? 'day';
        $startDate = $request->startDate ?? 0;
        $endDate = $request->endDate ?? date('Y-m-d', time()); //if user not import lastdat -> lay ngay hien tai lam moc thog ke

//        $dateFormat = '';
        //lấy format hiển thị
        switch ($statisticsBy) {
            case 'day':
                $dateFormat = '%Y-%m%-%d'; //đầy đủ năm tháng ngày
                break;
            case 'month':
                $dateFormat = '%Y-%m';   //đầy đủ năm tháng
                break;
            case 'year':
                $dateFormat = '%Y';
                break;
            default:
                $dateFormat = '%Y-%m%-%d';
        }

//            dd([$startDate, $endDate]);
//        Debugbar::info([$startDate, $endDate]);
        //dữ liệu cho biểu đồ line
        $lineChartData = OrderDetail::selectRaw('
                DATE_FORMAT(created_at, "' . $dateFormat . '") as date,
                SUM(total) as sum
            ')->whereRaw(
            'DATE_FORMAT(created_at, "%Y-%m%-%d") BETWEEN \'' . $startDate . '\' AND \'' . $endDate . '\''
        )->groupBy('date')->get();

//            dd($data);

        $lineChart = [
            'data' => $lineChartData,

            'xkey' => 'date',
            'ykeys' => ['sum'],
            'labels' => ['Tổng'],
            'xLabels' => $statisticsBy
        ];

//            $data = [
//                    'xkey' => 'year',
//                    'ykey' => ['value', 'value2'],
//                    'labels' => ['value', 'value2'],
//
//                    'data' => [
//                        [ 'year'=> '2008', 'value'=> 20, 'value2' => 1 ],
//                        [ 'year'=> '2009', 'value'=> 10, 'value2' => 2 ],
//                        [ 'year'=> '2010', 'value'=> 5, 'value2' => 17 ],
//                        [ 'year'=> '2011', 'value'=> 5, 'value2' => 11 ],
//                        [ 'year'=> '2012', 'value'=> 20, 'value2' => 12 ]
//                    ]
//            ];

        $donutChartData = OrderDetail::join('coffee_products', 'order_details.id_product', '=', 'coffee_products.id')
          //selectRaw là hàm tự định nghĩa select
            ->selectRaw('name AS label, SUM(qty) AS value')
            ->groupBy(['coffee_products.id', 'coffee_products.name'])
            ->get();


        $donutChart = [
            'data' => $donutChartData
        ];

        return [$lineChart, $donutChart];
//        }
    }

    public function getDataDonutCharts(Request $request) {


        return ;
    }

}
