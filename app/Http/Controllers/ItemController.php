<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request){

            // dd($request->query());

            if($request->code !== null){
                $items = Item::where('code','LIKE',"%$request->code%")->orderBy('id','DESC')->paginate(15)->appends(request()->query());
            }

            elseif($request->department_name !== null){
                $department_name = $request->department_name; 
                $items = Item::whereHas('department',function($query) use ($department_name) {
                    $query->where('name',$department_name);
                })->orderBy('id','DESC')->paginate(15)->appends(request()->query());
            }

            elseif($request->brand_name !== null){
                $brand_name = $request->brand_name; 
                $items = Item::whereHas('brand',function($query) use ($brand_name) {
                    $query->where('name',$brand_name);
                })->orderBy('id','DESC')->paginate(15)->appends(request()->query());
            }

            elseif($request->category_name !== null){
                $category_name = $request->category_name; 
                $items = Item::whereHas('category',function($query) use ($category_name) {
                    $query->where('name',$category_name);
                })->orderBy('id','DESC')->paginate(15)->appends(request()->query());
            }
            else{
                $items = Item::orderBy('id','DESC')->paginate(15)->appends(request()->query());
            }

        return view('items.index',['items' => $items]);
    }

    public function create(){
        return view('items.create');
    }

    public function store(Request $request){
        if($request->is_computer == '1'){
            $request->validate([
                'code' => 'required|unique:items',
                'category_id' => 'required',
                'brand_id' => 'required',
                'primary_memory' => 'required',
                'secondary_memory' => 'required',
                'generation' => 'required',
                'system_model' => 'required',
                'cpu' => 'required',
                'usb' => 'required',
            ]);
        }
        else{
            $request->validate([
                'code' => 'required|unique:items',
                'category_id' => 'required',
                'brand_id' => 'required',
                'department_id' => 'required',
            ]);
        }

        $item = new Item();

        $item->code = $request->code;
        $item->category_id =$request->category_id;
        $item->brand_id =$request->brand_id;
        $item->department_id =$request->department_id;
        $item->is_repair = $request->is_repair == 'on' ? 1 : 0;
        $item->is_store = $request->is_store == 'on' ? 1 : 0;


        $item->save();

        if($request->is_computer == '1'){
            $computer = new Computer();

            $computer->primary_memory = $request->primary_memory ?? '';
            $computer->secondary_memory = $request->secondary_memory ?? '';
            $computer->generation = $request->generation ?? '';
            $computer->system_model = $request->system_model ?? '';
            $computer->cpu = $request->cpu ?? '';
            $computer->usb = $request->usb ?? 0;
            $computer->is_dvd = $request->is_dvd == 'on' ? 1 : 0;
            $computer->is_hdmi = $request->is_hdmi == 'on' ? 1 : 0;
            $computer->is_network = $request->is_network == 'on' ? 1 : 0;
            $computer->item_id = $item->id;

            $computer->save();
        }

        return back()->with('message','Items Created Successfully !');
    }

    public function edit($id){

        $item = Item::findOrFail($id);

        return view('items.edit',['item' => $item]);
    }

    public function update(Request $request, Item $item){

        if($request->is_computer == '1'){
            $request->validate([
                'code' => 'required|unique:items,code,'.$item->id,
                'category_id' => 'required',
                'brand_id' => 'required',
                'primary_memory' => 'required',
                'secondary_memory' => 'required',
                'generation' => 'required',
                'system_model' => 'required',
                'cpu' => 'required',
                'usb' => 'required',
            ]);
        }
        else{
            $request->validate([
                'code' => 'required|unique:items,code,'.$item->id,
                'category_id' => 'required',
                'brand_id' => 'required',
                'department_id' => 'required',
            ]);
        }

        $item->code = $request->code;
        $item->category_id =$request->category_id;
        $item->brand_id =$request->brand_id;
        $item->department_id =$request->department_id;
        $item->is_repair = $request->is_repair == '1' ? 1 : 0;
        $item->is_store = $request->is_store == '1' ? 1 : 0;

        $item->save();

        if($request->is_computer == '1'){
            $computer = $item->computer;

            $computer->primary_memory = $request->primary_memory ?? '';
            $computer->secondary_memory = $request->secondary_memory ?? '';
            $computer->generation = $request->generation ?? '';
            $computer->system_model = $request->system_model ?? '';
            $computer->cpu = $request->cpu ?? '';
            $computer->usb = $request->usb ?? 0;
            $computer->is_dvd = $request->is_dvd == '1' ? 1 : 0;
            $computer->is_hdmi = $request->is_hdmi == '1' ? 1 : 0;
            $computer->is_network = $request->is_network == '1' ? 1 : 0;
            $computer->item_id = $item->id;

            $computer->save();
        }

        return to_route('items.index')->with('message','Items Updated Successfully !');
    }

    public function getDetails($id){
        
        $data = Computer::where('item_id',$id)->select('secondary_memory','primary_memory','system_model','generation','cpu','is_hdmi','is_network','is_dvd','usb')->first();

        if($data){
            return response()->json([
                'data' => $data
            ]);
        }
        return response()->json([
            'message' => 'There is no computer details !'
        ]);
    }

    public function destroy($id){

        $item = Item::findOrFail($id);

        if($item->computer !== null){
            $computer = Computer::where('item_id',$id)->first();
            $computer->delete();
        }

        $item->delete();
        return back()->with('message','Items Deleted Successfully !');
    }
}
