<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
protected $guarded= [];
public $timestamps=false;
     public function prodects()
    {

return $this->hasMany('\App\prodect','c_name');
 }
 public function pemmanths()
    {

return $this->hasMany('\App\premmanth','c_name');
 }
}
