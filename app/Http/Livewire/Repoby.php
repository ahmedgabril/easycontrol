<?php

namespace App\Http\Livewire;
use Illuminate\Support\Collection;
use App\customer;
use App\prodect;
use Livewire\Component;
use Livewire\WithPagination;

class Repoby extends Component
{
    use WithPagination;

    public $sel = 10;
    public $datestart;

    public $dateend;
   public $status = false;
   public $getsum ;
   protected $getdata1 ;
   public $getcount;
    public function getdate(){
   

        $this->getsum = prodect:: whereBetween('date', [$this->datestart,$this->dateend])

        ->sum("prodect_price");


        $this->getcount =  prodect:: whereBetween('date', [$this->datestart,$this->dateend])

        ->count("prodect_price");


      $getac = prodect:: with(["customer" =>function($qe){ $qe->select("name" ,"id");}])
    

      ->whereBetween('date', [$this->datestart,$this->dateend])->select("prodect_name","date","prodect_price","c_name")->paginate($this->sel);
      

        if($getac->count() > 0){
            $this->status = true;
            return  $getac ;

        }else{

            $this->status = false;  
        }
       

     

    }

    public function render()
    {
        if($this->status){
            $this->getdata1 = $this->getdate();


        }
    

        return view('livewire.repoby',['data' => prodect::sum("prodect_price"),
        "getdata" => $this->getdata1,
        "count" => prodect::count()]);
    }
}
