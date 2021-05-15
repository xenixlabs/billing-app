<?php

namespace App\Http\Controllers;

use App\Models\Challans;
use App\Models\Masters;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request){
        $title = "Monthly Report";
        $masters = Masters::get();
        if($request->input('customer_id')){
            $challans = Challans::where('user_id', auth()->user()->id);
            $challans = $challans->where('customer_id', $request->input('customer_id'))
                                 ->where('date', '>=', $request->input('from'))
                                 ->where('date', '<=', $request->input('to'))
                                 ->get();

            return view('report.index')->with('title', $title)
                                       ->with('masters', $masters)
                                       ->with('challans', $challans);
        }

        return view('report.index')->with('title', $title)
                                   ->with('masters',$masters);
    }
}
