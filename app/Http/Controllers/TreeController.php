<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use DB;
use Auth;
use Carbon\Carbon;

use App\Tree_title;
use App\Tree_data;

class TreeController extends Controller {

   public function __construct(){
      $this->middleware('auth');
   }

   public function index(){
      $data['tree_title'] = Tree_title::all();
      $data['tree_data'] = Tree_data::all();
      $data['tree_data_parents'] = Tree_data::where('parent_id', null)->get();
      return view('home', $data);
   }

// title_name
   public function addTitle(Request $request){
      $validator = Validator::make($request->all(),[
         'title_name'=>'required'
      ]);
      if($validator->fails()) {
         $messages = $validator->messages();       
         return Redirect::back()->withErrors($validator);
      }
      Tree_title::insert([
         'user_id'=> Auth::id(),
         'title_name'=>$request->title_name,
         'created_at' => Carbon::now()
      ]);
      return back()->with('success','Title save successfully');
   }

// addParent
   public function addParent(Request $request){
      $validator = Validator::make($request->all(),[
         'parent'=>'required'
      ]);
      if($validator->fails()) {
         $messages = $validator->messages();       
         return Redirect::back()->withErrors($validator);
      }
      Tree_data::insert([
         'user_id'=> Auth::id(),
         'data_name'=>$request->parent,
         'created_at' => Carbon::now()
      ]);
      return back()->with('success','Parent data save successfully');
   }

// Delete
   public function deleteTreeTitle($id){
      Tree_title::find($id)->delete();
      Tree_data::where('parent_id', $id)->delete();
      return back()->with('danger', 'Title delete successfully');
   }

   public function deleteTreeData($id){
      Tree_data::find($id)->delete();
      return back()->with('danger', 'Tree data delete successfully');
   }

// depency code
   public function itrerate(Request $request){
      $childTitle = $request->route()->uri;
      $country = Tree_data::where('parent_id', $request->parent_id)->select('id', 'data_name')->get();
      // $totalChild = $country->count();
      return response()->json([$childTitle => $country]);
   }

}
