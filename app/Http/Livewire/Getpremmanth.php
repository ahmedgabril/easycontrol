<?php

namespace App\Http\Livewire;

use App\customer;
use App\premmanth;
use App\prodect;
use http\Env\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Getpremmanth extends Component
{
    use WithPagination;
    public $getprodect;
    public $getcustomer;
    public $getname=[];
    public $prodects= [];
    public $name;
    public $date;
    public $getdate;
    public $getdes;
    public $data;
    public  $des;
    public $getpremmanth1=[];
    public $dis;
    public $dis2;
    public $genralid;
    public $prem_manth;
    public $getamount_mants;
    public $sel = "10";
    public $premm;
    public function getpremmanth(){

        if(!empty($this->getprodect)) {

            $this->getname = prodect::with('premmanths')->where('id', $this->getprodect)->get();//paginate($this->sel);
            if (!empty($this->getname)) {
                foreach ($this->getname as $getallpro) {

                }

                $this->getpremmanth1 = $getallpro->premmanths->count();
                if($this->getpremmanth1 == 0){

                    for ($i = 0; $i < $getallpro->prem_lemt; $i++) {
                        $this->date = strtotime($i . 'month', strtotime($getallpro->date));
                        $this->getdate = date("Y-m-d", $this->date);
                        premmanth::create([
                            'prems_id' => $getallpro->id,
                            'c_name' => $getallpro->c_name,
                            'date' => $this->getdate,
                            'amount_manth' => "0",

                        ]);
                    }
                }else{
                    return false;
                }
            }
        }

    }

    public function render()
    {
        if(!empty($this->name)) {


            $setdata = $this->premm - $this->name;
            if ($this->name < $this->premm) {

                     $this->dis2 = "متبقى عليه" . $setdata . "جنيه";


            } elseif ($this->name > $this->premm) {

                    $this->dis2 = " ترحيل للشهر القادم" . ' ' . abs($setdata) . '  ' . "جنيه";



            } else {

                $this->dis2 = "";

            }
        }
        if(!empty($this->getcustomer)){

            $this->prodects= prodect::select('id','prodect_name')->where('c_name',$this->getcustomer)->get();
        }

        if(!empty($this->getprodect)){

            $this->getpremmanth();


        }

        return view('livewire.getpremmanth', ['getcust' => customer::select('id','name')->get(),
            'counts'=> premmanth::count(),
            //'getaction'=> $this->getaction
            'getaction'=> premmanth::where('c_name',$this->getcustomer)->where('prems_id',$this->getprodect)->Paginate($this->sel)

        ]);

    }

    public function edit($getid)
    {
        $this->genralid = $getid;
        $get = premmanth::find( $this->genralid);
        $set = prodect::find($get->prems_id);
        $this->premm = $set->prem_manth;
        $this->name = $get->amount_manth;
        $this->dis =  $get->discrption ;
        $this->dis2 =$get->disc2;








    }
    public function update(){

     $getup = premmanth::find($this->genralid)->update([


        'amount_manth' =>$this->name ,
        'discrption' => $this->dis ,
        'disc2' =>  $this->dis2

     ]);
        session()->flash("message", "تم اضافه بيانات القسط الشهرى بنجاح🙂");
         $this->emit('upprem');
    }


}
