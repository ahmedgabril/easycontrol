<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class premmanth extends Model
{
    protected $guarded = [];
    public $timestamps=false;




    public function customer (){

      return $this->belongsTo('\App\customer','c_name','id');
    }
    public function prodect (){

      return $this->belongsTo('\App\prodect','prems_id','id');
    }
}
