<?php

namespace App\Http\Controllers;
use App\Models\Challan;
use App\Models\Item;
use App\Models\Master;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = "Dashboard";
        $current_month = date('Y-m');
        $total_amount = 0;
        $monthly_amount = 0;
        $challan = Challan::where('user_id', auth()->user()->id)->get();
        $challan_cnt = count($challan);
        $masters_cnt = count(Master::where('user_id', auth()->user()->id)->get());
        foreach ($challan as $item) {
            $total_amount = $total_amount + $item->amount;
            if(date("Y-m",strtotime($item->date)) == $current_month){
                $monthly_amount = $monthly_amount + $item->amount;
            }
        }

        return view('dashboard.index')->with('title', $title)
                                      ->with('total', $total_amount)
                                      ->with('monthly', $monthly_amount)
                                      ->with('count', $challan_cnt)
                                      ->with('masters',$masters_cnt);
    }
}
