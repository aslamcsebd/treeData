<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tree_data extends Model{
   // use SoftDeletes;
   
   public function children(){
      return $this->hasMany(Tree_data::class, 'parent_id')->with('children');        
   }
}

