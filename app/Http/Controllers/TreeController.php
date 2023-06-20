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

   public function index(){
      /*
      recursive function
      $data['parentList'] = Tree_data::where('user_id', Auth::id())->where('parent_id', 0)->with(['children'])->get();  
      dd($parent);
      */

      $data['tree_title'] = Tree_title::where('user_id', Auth::id())->get();
      $data['tree_data'] = Tree_data::where('user_id', Auth::id())->get();
      $data['tree_data_parents'] = Tree_data::where('user_id', Auth::id())->where('parent_id', 0)->get();
      return view('home', $data);
   }

   //Manual [recursive function]
   public function index2(){
      $allData = Tree_data::where('user_id', Auth::id())->get();
      $parent = $allData->where('parent_id', 0);

      self::formateTree($parent, $allData);

      // dd($parent);      
      return view('nestedLoop', compact('parent'));
   }

   private static function formateTree($parent, $allData){
      foreach($parent as $child) {
            $child->name;
            $child->children = $allData->where('parent_id', $child->id)->values();
            if($child->children->count() > 0){
               self::formateTree($child->children, $allData);
            }
      }
   }

   // title_name
   public function addTitle(Request $request){

      Validator::extend('unique_custom', function ($attribute, $value, $parameters){
         list($table, $field, $field2, $field2Value) = $parameters; 
         return DB::table($table)->where($field, $value)->where($field2, $field2Value)->count() == 0;
      });

      $validator = Validator::make($request->all(),[
         'title_name'=>'required|unique_custom:tree_titles,title_name,user_id,'. Auth::id(),
      ],
      [
         'title_name.required' => 'The :attribute field is required.',
         'title_name.unique_custom' => 'The :attribute field must be unique under '. Auth::user()->name
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
         'parent_id'=> 0,
         'data_name'=>$request->parent,
         'created_at' => Carbon::now()
      ]);
      return back()->with('success','Parent data save successfully');
   }

   // addData
   public function addData(Request $request){

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
      return back()->with('danger', 'Title delete successfully');
   }

   public function deleteTreeData($id){
      Tree_data::find($id)->delete();
      Tree_data::where('parent_id', $id)->delete();
      return back()->with('danger', 'Tree data delete successfully');
   }

   // depency code
   public function itrerate(Request $request){

      if($request->titleCount == $request->titleId){
         $childTitle = session()->get('childTitle');       
         $parent_id = session()->get('parentId');
      }else{
         session()->forget('childTitle');
         session()->put('childTitle', $request->route()->uri);
         $childTitle = session()->get('childTitle');

         session()->forget('parentId');
         session()->put('parentId', $request->parent_id);
         $parent_id = session()->get('parentId');
      }

      $country = Tree_data::where('parent_id', $parent_id)->select('id', 'data_name')->get();
      $totalChild = $country->count();
      return response()->json([$childTitle => $country, 'totalChild' => $totalChild]);
   }

   // public function itrerate(Request $request){
   //    $childTitle = $request->route()->uri;
   //    $country = Tree_data::where('parent_id', $request->parent_id)->select('id', 'data_name')->get();
   //    $totalChild = $country->count();
   //    return response()->json([$childTitle => $country, 'totalChild'=> $totalChild]);
   // }
}


