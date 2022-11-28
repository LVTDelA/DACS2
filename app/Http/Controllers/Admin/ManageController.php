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

    public function getDataChartLine(Request $request)
    {
        if ($request->ajax()) {

        $data = OrderDetail::selectRaw('
                DATE_FORMAT(order_details.created_at, "%Y-%m-%d") as date,
                SUM(total) as sum
            ')->groupBy('date')->get();

//            dd($data);

        $chart = [
            'xkey' => 'date',
            'ykey' => ['sum'],
            'labels' => ['Tổng'],

            'data' => $data,
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
        }
    }
}
