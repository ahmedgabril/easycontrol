<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prodect extends Model
{
   protected $guarded=[];
    public $timestamps=false;


    public function customer()
   {

     return $this->belongsTo('\App\customer','c_name','id');
   }
   public function premmanths()
   {

     return $this->hasMany('\App\premmanth','prems_id','id');
   }
}
