<?php

namespace App\Http\Livewire;

use App\prodect;
use Livewire\Component;
use Livewire\WithPagination;

class Pro extends Component
{
    use WithPagination;
    public $name;
    public $itemid;
    public $action;
    public $serch ="";
    public $sel = "10";
    public  $order = 'desc';


 public function selectitme($itemid,$action)
 {
  $this->itemid = $itemid;
  $getname = prodect::findOrFail($itemid);
   $this->name = $getname->name;
  if($action == 'update'){
      $this->emit('update');
      $this->emit('gitmodelid', $this->itemid);

  }
 }
    protected $listeners = [
        'refpro' =>'$refresh'

    ];



    public function render()
        {



            return view('livewire.pro', ['data' => $this->serch == "" ? prodect::with('catogery')->orderBy('id', $this->order)->paginate($this->sel) :
                prodect::with('catogery')->where("name", "like", '%' . $this->serch . '%')->orwhere("price_sal", "like", '%' . $this->serch . '%')->paginate($this->sel),

                'counts' => prodect::count()

            ]);

    }
    public function delete(){

       prodect::destroy($this->itemid);

        $this->emit('del');
        session()->flash("message","تم حذف بيانات  الصنف بنجاح😮");
    }

}
