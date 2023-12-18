<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Department;
use App\Models\Item;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        $data = [];

        if($request->has('department_name')){
            if($request->department_name == 'All'){
                $departments = Department::with('items')->get();
            }
            else{
                $departments = Department::where('name',$request->department_name)->with('items')->get();
                if(count($departments) < 1){
                    return view('user-dashboard.index',['categories' => $categories,'data' => $data]);
                }
            }
        }
        else{
            $departments = Department::with('items')->get();
        }

        // dd($departments);

        foreach($departments as $department){
            $category_count[$department->name] = [];           
            $brands = Brand::select('id','name')->get();

            foreach($brands as $brand){
                $cat = [];
                // items count by cat
                foreach($categories as $category){
                    $cat[$category->name] = Item::where('brand_id',$brand->id)
                                                ->where('department_id',$department->id)
                                                ->where('category_id',$category->id)
                                                ->count();
                }
               $category_count[$department->name][$brand->name] = $cat;
            }
            

            $data = $category_count;
        }
        

        return view('user-dashboard.index',['categories' => $categories,'data' => $data]);
    }
}
