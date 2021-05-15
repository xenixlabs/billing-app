<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masters;
use App\Models\Challans;
use App\Models\Items;
use Illuminate\Broadcasting\Channel;

class ChallanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Challans";
        $challans = Challans::where('user_id', auth()->user()->id)->get();

        return view('challan.index')->with('title', $title)
                                    ->with('challans', $challans);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Challan";
        $id = auth()->user()->id;
        $masters = Masters::where('user_id',$id)->get();
        return view('challan.add')->with('title', $title)
                                  ->with('masters', $masters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'customer_id'=>'required',
            'date'=>'required',
        ]);

        $master = Masters::find($request->input('customer_id'));
        $existingChallans = Challans::where('customer_id',$request->input('customer_id'))->count();
        if($existingChallans > 0){
            $index_number = $existingChallans+1;
            $index = sprintf('%04d',$existingChallans+1);
        }
        else{
            $index_number = 1;
            $index = '0001';
        }


        $challan = new Challans;
        $challan->name = $master->prefix . date('y', strtotime($request->input('date'))) . date('y',strtotime($request->input('date').'+ 1 year')) . $index;
        $challan->date = $request->input('date');
        $challan->customer_id = $request->input('customer_id');
        $challan->user_id = auth()->user()->id;
        $challan->amount = 0;
        $challan->remarks = $request->input('remarks');
        $challan->index = $index_number;
        $challan->save();

        return redirect('/challan/'.$challan->id)->with('success','Challan Created');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $title = "Challans";
        $challans = Challans::where('user_id',auth()->user()->id);
        if($request->input('search')){
            $challans = $challans->where('name', 'LIKE', "%".$request->input('search')."%");
        }
        $challans = $challans->paginate(15);

        return view('challan.index')->with('title', $title)
                                    ->with('challans', $challans);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $challan = Challans::find($id);
        $items = Items::where('challan_id', $id)->get();
        return view('challan.challan')->with('challan',$challan)
                                      ->with('items',$items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $title = 'Edit Challan';
        $challan = Challans::find($id);
        $masters = Masters::where('user_id',auth()->user()->id)->get();
        return view('challan.edit')->with('challan', $challan)
                                   ->with('title', $title)
                                   ->with('masters', $masters);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'customer_id'=>'required',
            'date'=>'required',
        ]);

        $challan = Challans::find($id);
        $master = Masters::find($request->input('customer_id'));
        $index = sprintf('%04d',$challan->index);
        $challan->name = $master->prefix . date('y', strtotime($request->input('date'))) . date('y',strtotime($request->input('date').'+ 1 year')) . $index;
        $challan->customer_id = $request->input('customer_id');
        $challan->date = $request->input('date');
        $challan->remarks = $request->input('remarks');
        $challan->save();

        return redirect("/challan/".$id)->with('success','Challan edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Items::where('challan_id',$id)->delete();
        $challan = Challans::find($id);
        $challan->delete();

        return redirect('/challan')->with('success', 'Challan Deleted!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeItems(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'amount'=>'required',
            'unit'=>'required',
            'challan_id'=>'required'
        ]);

        $item = new Items;
        $item->name = $request->input('name');
        $item->unit = $request->input('unit');
        $item->price = $request->input('price');
        $item->amount = $request->input('amount');
        $item->quantity = $request->input('quantity');
        $item->challan_id = $request->input('challan_id');
        $item->save();

        $challan = Challans::find($request->input('challan_id'));
        $challan_items = Items::where('challan_id', $request->input('challan_id'))->get();
        $temp = 0;
        foreach ($challan_items as $element) {
            $temp = $temp + $element->amount;
        }
        $challan->amount = $temp;
        $challan->save();

        return redirect('/challan/'.$request->input('challan_id'))->with('success','Item Added!');
    }

    public function deleteItems(Request $request, $id){

        $this->validate($request, [
            'challan_id'=> 'required'
        ]);

        $item = Items::find($id);
        $item->delete();

        $challan = Challans::find($request->input('challan_id'));
        $challan_items = Items::where('challan_id', $request->input('challan_id'))->get();
        $temp = 0;
        foreach ($challan_items as $element) {
            $temp = $temp + $element->amount;
        }
        $challan->amount = $temp;
        $challan->save();

        return redirect('/challan/'.$request->input('challan_id'))->with('success', 'Item Deleted!');
    }

    public function print($id){

        $challan = Challans::find($id);

        return view('challan.print')->with('challan',$challan);
    }
}
