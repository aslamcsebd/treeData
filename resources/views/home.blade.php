@extends('layouts.app')
@section('content')
<div class="container-fluid">
   <div class="row justify-content-center">
      <div class="col-md-8">         
         <fieldset>
            <legend>Tree title list</legend>
            <table class="table table-bordered mt-2">
               <thead>
                  <th>Sl</th>
                  <th>Tree title</th>
                  <th>Action</th>
               </thead>
               <tbody>
                  @foreach($tree_title as $title)
                     <tr>
                        <td width="10">{{$title->id}}</td>
                        <td>{{$title->title_name}}</td>
                        <td width="20">
                           @if($tree_title->count()==$loop->iteration)
                              <div class="btn-group" role="group" aria-label="Basic example">
                                  <a class="btn btn-sm btn-danger py-0" onclick="return confirm('Are you want to delete this?')" href="{{ url('deleteTreeTitle', $title->id)}}">Delete</a>
                              </div>
                           @else
                              <small>Parent</small>        
                           @endif
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </fieldset>

         <fieldset>
            <legend>Tree data</legend>
            <table class="table table-bordered">
               <thead>
                  <th>Sl</th>
                  <th>Parent_id</th>
                  <th>name</th>
                  <th>Action</th>
               </thead>
               <tbody>
                  @foreach($tree_data as $data)
                     <tr>
                        <td width="10">{{$loop->iteration}}</td>
                        <td>{{($data->parent_id==null) ? 'Parent':$data->parent_id}}</td>
                        <td>{{$data->data_name}}</td>
                        <td width="10">
                           <div class="btn-group">
                              <a class="btn btn-sm btn-outline-info py-0 disabled" href="{{ url('admin/viewPendingFaq', $data->ownerId)}}">View</a>
                             <a class="btn btn-sm btn-danger py-0" onclick="return confirm('Are you want to delete this?')" href="{{ url('deleteTreeData', $data->id)}}">Delete</a>
                           </div>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </fieldset>
      </div>

      <div class="col-4">
         <fieldset>
            <legend>Tree title</legend>
               <form action="{{url('addTitle')}}" method="post">
                  @csrf
                  <div class="row">
                     <input type="text" class="form-control offset-1 col-7" name="title_name" placeholder="Title name" required>
                     <button type="submit" name="addTitle" class="btn btn-sm btn-primary offset-1">Add title</button>
                  </div>
               </form> 
         </fieldset>

         <fieldset>
            <legend>Tree data</legend>
               <form action="" method="post">
                  @csrf
                  <div class="row">
                     @if($tree_title->count()>0)
                        @foreach($tree_title as $title)
                           <input type="text" class="form-control offset-1 col-7 my-1" name="tree[]" placeholder="{{$title->title_name}} name*">
                        @endforeach
                     @else
                        <input type="text" class="form-control offset-1 col-7" name="tree[]" placeholder="Add parent data">
                     @endif                 
                     <button type="submit" name="addTreeData" class="btn btn-sm btn-primary offset-8 mt-2">Add tree data</button>
                  </div>
               </form>
         </fieldset>
      </div>
   </div>
</div>
@endsection
