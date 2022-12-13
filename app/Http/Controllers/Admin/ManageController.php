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
//        if ($request->ajax()) {

        $statisticsBy = $request->statisticsBy ?? 'day';
        $startDate = $request->startDate ?? 0;
        $endDate = $request->endDate ?? date('Y-m-d', time());

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

//            dd([$startDate, $endDate]);
        Debugbar::info([$startDate, $endDate]);
        $data = OrderDetail::selectRaw('
                DATE_FORMAT(created_at, "' . $dateFormat . '") as date,
                SUM(total) as sum
            ')->whereRaw(
            'DATE_FORMAT(created_at, "%Y-%m%-%d") BETWEEN \'' . $startDate . '\' AND \'' . $endDate . '\''
        )->groupBy('date')->get();

//            dd($data);


        $chart = [
            'data' => $data,

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

        return $chart;
//        }
    }
}
