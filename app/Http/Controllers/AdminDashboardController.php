<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Computer;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{

    public function index(){
        $categories = Category::all();
        $total_using_device = Item::where('is_repair',0)->where('is_store',0)->count();
        $total_repair_device = Item::where('is_repair',1)->count();
        $total_store_device = Item::where('is_store',1)->count();
        return view('dashboard',['categories' => $categories,'total_using_device' => $total_using_device,'total_repair_device' => $total_repair_device,'total_store_device' => $total_store_device]);
    }
}
