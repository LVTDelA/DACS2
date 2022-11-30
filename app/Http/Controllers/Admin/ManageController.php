<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.manage.index');
    }

    public function getDataLineCharts(Request $request)
    {
//        if ($request->ajax()) {

            $statisticsBy = $request->statisticsBy ?? 'day';
            $startDate = $request->startDate ?? 0;
            $endDate = $request->endDate ?? date('y-m-d', time());

            $dateFormat = '';
            switch ($statisticsBy) {
                case 'day':
                    $dateFormat = '%Y-%m%-%d';
                    break;
                case 'month':
                    $dateFormat = '%Y-%m';
                    break;
                case 'year':
                    $dateFormat = '%Y';
                    break;
                default:
                    $dateFormat = '%Y-%m%-%d';
            }

            $data = OrderDetail::selectRaw('
                DATE_FORMAT(created_at, "'. $dateFormat .'") as date,
                SUM(total) as sum
            ')->where([
                ['created_at', '>=', $startDate],
                ['created_at' , '<=', $endDate]
            ])->groupBy('date')->get();

//            dd($data);


            $chart = [
                'data' => $data,

                'xkey' => 'date',
                'ykeys' => ['sum'],
                'labels' => ['Tổng'],
                'xLabels' => $statisticsBy

//            'data' => [
//                ['day' => '2008', 'value' => 20],
//                ['day' => '2009', 'value' => 10],
//                ['day' => '2010', 'value' => 5],
//                ['day' => '2011', 'value' => 5],
//                ['day' => '2012', 'value' => 20]
//            ]
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

            return $chart;
//        }
    }
}
