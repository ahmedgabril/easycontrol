<?php

namespace App\Http\Livewire;

use App\customer;
use App\premmanth;
use App\prodect;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Manth extends Component
{
use WithPagination;
    public $status = true;
    public $sel = 10;
    public $datestart;
    protected $getaction;
    public $dateend;
    public $reslt;
    public function getdate(){
        $this->status = false;
        $getdata =  premmanth::with('customer','prodect')->whereBetween('date', [$this->datestart,$this->dateend])

                ->where('amount_manth',"0")
                ->orWhere('disc2','%'.'متبقى عليه'.'%')
                ->paginate($this->sel);

          if( $getdata->count() > 0){
              $this->status = false;

              return $getdata;

          }else{
              $this->status = true;
          }


    }
    public function resetinp(){

        $this->dateend = "";
        $this->datestart = "";
        $this->status = true;
    }

    public function render()
    {
        if($this->status == true){

            $this->getaction = premmanth::with('customer','prodect')->whereDate('date',now()->subMonths(1))
                ->where('amount_manth',"0")
                ->orWhere('disc2','%'.'متبقى عليه'.'%')
                ->paginate($this->sel);
            //dd($this->getaction);
        }else{
            $this->getaction = $this->getdate();

        }


        return view('livewire.manth',[
              'getaction' =>  $this->getaction,
              'counts' => premmanth::with('customer','prodect')->whereDate('date',now()->subMonths(1))
                  ->where('amount_manth',"0")
                  ->orWhere('disc2','%'.'متبقى عليه'.'%')->count()

        ]);
    }
}
