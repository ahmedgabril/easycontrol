<?php

namespace App\Http\Livewire;

use App\prodect;
use Livewire\Component;
use Livewire\WithPagination;

class Allprodect extends Component
{
    use WithPagination;
   public $getname;
   public $name;
  public $getdes;
  public  $des;


    public $serch ="";
    public $sel = "10";

    public  $order = 'desc';
    public function showname($getid1){
     $this->getname =$getid1;

       $getid1  = prodect::findOrFail( $this->getname );
     $this->name = $getid1->prodect_name;
    }

    public function redmore($getid2){
     $this->des =$getid2;

       $getid2  = prodect::findOrFail( $this->des );
     $this->getdes = $getid2->discrption;
    }
    public function edit($getid){
           if(isset($getid)){
               redirect()->to('/updatepro/'.$getid);

           }else{

               redirect()->to('/prodect');
           }



    }
    public function delete($id){

        prodect::destroy($this->getname);
        $this->emit('del');
        session()->flash('message','تم حذف بيانات المنتج بنجاح😏');
    }
    public function render()
    {
        return view('livewire.allprodect',['data' => $this->serch == "" ? prodect::with('customer')->orderBy("id",$this->order)->paginate($this->sel):prodect::with('customer')->where("prodect_name","like","%".$this->serch."%")->paginate($this->sel),

            'counts'=> prodect::count()
        ]);
    }
    public function restinput(){

        $this->getdes = "";
    }
}
