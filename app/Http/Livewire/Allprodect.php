<?php

namespace App\Http\Livewire;

use App\prodect;
use App\customer;
use App\premmanth;
use Illuminate\Support\Carbon;
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
    public  $prodect_name;
    public  $getdate;
    public  $getid;
    public $customer_name;
    public $date;
    public $date1;
    public $prodect_price  ;
    public $amount_pay = "00" ;
    public $precent ;
    public $rem_amount;
    public $prem_lemt;
    public $manthpay;
    public $taker_name;
    public $taker_phone;
    public $taker_id;
    public $descrption;
    public $sum ;
   
    public $carbondate;

    protected $listeners = ['getval'];
    public function updated($field)
    {
        $this->validateOnly($field,[
            'prodect_name' => 'required|unique:prodects|max:250|min:3',

            'customer_name' => 'required',
            'date' => 'required',
            'prodect_price' => 'required',
            'precent' => 'required',
            'rem_amount' => 'required',
            'prem_lemt' => 'required',
            'manthpay' => 'required',


        ],[


            'prodect_name.required' => 'اسم المنتج مطلوب',
            'prodect_name.min' => 'اسم المنتج لابد ان لا يقل عن 3 احرف',
            'prodect_name.unique' => 'اسم المنتج مسجل من قبل',
            'prodect_name.max' => ' الحد الاقصى للحروف 250 حرف',
            'prodect_price.required' => 'سعر المنتج مطلوب',
            'customer_name.required' => 'اسم العميل مطلوب',
            'date.required' => 'ادخل التاريخ',
            'precent.required' => 'هامش الربح مطلوب',
            'prem_lemt.required' => 'فتره القسط مطلوبه',
            'manthpay.required' => 'القسط الشهرى مطلوب',
            'rem_amount.required' => 'المبلغ المتبقى مطلوب',


        ]);
    }

    public function mount(){
        if(!empty($this->amount_pay) && !empty($this->prodect_price) && !empty($this->precent)){



            if (!empty($this->prodect_price) && !empty($this->precent)) {

                $this->sum = $this->prodect_price - $this->amount_pay;
                $this->sum += $this->sum * ($this->precent) / 100;
                $this->rem_amount = $this->sum;
                return  number_format($this->rem_amount);

            } else {
                return $this->rem_amount = "";


            }

        }else {
            if (!empty($this->prodect_price) && !empty($this->precent)) {
                $this->sum = $this->prodect_price;
                $this->sum += $this->sum * ($this->precent) / 100;
                $this->rem_amount = $this->sum;
                return number_format($this->rem_amount);
            }


        }
  

    }
    public function calk(){

        if(!empty($this->rem_amount) && !empty($this->prem_lemt)) {


            $this->manthpay = $this->rem_amount / $this->prem_lemt;
            return $this->manthpay = round( $this->manthpay );
        }
    }



    public function edit($getid){
        $this->getid = $getid;
         $getid =prodect::findOrFail($this->getid) ;

         $this->prodect_name =$getid->prodect_name;
         $this->prodect_price =$getid->prodect_price;
         $this->taker_id =$getid->teker_id;
         $this->taker_phone =$getid->teker_phone;
         $this->taker_name =$getid->teker_phone;
         $this->precent =$getid->precent;
         $this->prem_lemt =$getid->prem_lemt;
         $this->amount_pay =$getid->amount_pay;
         $this->rem_amount =$getid->rem_amount;
         $this->manthpay =$getid->prem_manth;
         $this->date = $getid->date;
         $this->customer_name =$getid->c_name;
         $this->descrption =$getid->discrption;

     }

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
        


//function update



public function update(){




    $this->validate([
        'prodect_name' => 'required|max:250|min:3|unique:prodects,prodect_name,'.$this->getid,

        'customer_name' => 'required',
        'date' => 'required',
        'prodect_price' => 'required',
        'precent' => 'required',
        'rem_amount' => 'required',
        'prem_lemt' => 'required',
        'manthpay' => 'required',


    ],[


        'prodect_name.required' => 'اسم المنتج مطلوب',
        'prodect_name.min' => 'اسم المنتج لابد ان لا يقل عن 3 احرف',
        'prodect_name.unique' => 'اسم المنتج مسجل من قبل',
        'prodect_name.max' => ' الحد الاقصى للحروف 250 حرف',
        'prodect_price.required' => 'سعر المنتج مطلوب',
        'customer_name.required' => 'اسم العميل مطلوب',
        'date.required' => 'ادخل التاريخ',
        'precent.required' => 'هامش الربح مطلوب',
        'prem_lemt.required' => 'فتره القسط مطلوبه',
        'manthpay.required' => 'القسط الشهرى مطلوب',
        'rem_amount.required' => 'المبلغ المتبقى مطلوب',


    ]);

     $this->carbondate = carbon::parse($this->date)->isoFormat('YYYY-MM-DD');

    $data = [
        'prodect_name' => $this->prodect_name,
        'prodect_price' => $this->prodect_price,
        'date' =>  $this->carbondate,
        'c_name' => $this->customer_name,
        'discrption' => $this->descrption,
        'teker_name' => $this->taker_name,
        'teker_phone' => $this->taker_phone,
        'teker_id' => $this->taker_id,
        'amount_pay' => $this->amount_pay,
        'prem_lemt' => $this->prem_lemt,
        'rem_amount' => $this->rem_amount,
        'prem_manth' => $this->manthpay,
        'precent' => $this->precent




    ];

    prodect::findOrFail($this->getid)->update($data);
    session()->flash("message", "تم تعديل بيانات المنتج بنجاح🙂");

    $this->emit("update1");
    $this->resetval();


            $getpro = prodect::with('premmanths')->where('id', $this->getid)->get();//paginate($this->sel);
            if (!empty($getpro)) {
                foreach ($getpro as $getallpro) {


                }
                if(!empty($getallpro->premmanths)){
                    foreach ($getallpro->premmanths as $pre) {


                    }

                }



            $coll = collect( $getallpro->premmanths);

              $getnumpremid = $coll->count();


                 $p=  $getallpro->prem_lemt - $getnumpremid  ;
                $getcount= abs($p);





                 if($getnumpremid  > 0 ){

                if(  $getnumpremid < $getallpro->prem_lemt ) {


                    for ($i = 0; $i < $getcount; $i++) {
                        $this->date1 = strtotime($i + 1 . 'month', strtotime($pre->date));

                        $this->getdate = date("Y-m-d", $this->date1);

                        premmanth::create([
                            'prems_id' => $getallpro->id,
                            'c_name' => $getallpro->c_name,
                            'date' => $this->getdate,
                            'amount_manth' => 0,
                            'discrption' => "",
                            'disc2' => "",

                        ]);
                    }
                }
                 }


               if($getnumpremid > $getallpro->prem_lemt){

                  $gtp = premmanth::where('prems_id',$pre->prems_id)->orderBy('id','desc')->take($getcount)->get();
                  foreach($gtp as $tid){

                      premmanth::destroy($tid->id);

                  }



                  }
                }





   










}




//endfunction update


    public function delete($id){

        prodect::destroy($this->getname);
        $this->emit('del');
        session()->flash('message','تم حذف بيانات المنتج بنجاح😏');
    }
    public function render()

    {

        $this->mount();
        $this->calk();
        return view('livewire.allprodect',['data' => $this->serch == "" ? prodect::with('customer')->orderBy("id",$this->order)->paginate($this->sel):prodect::with('customer')->where("prodect_name","like","%".$this->serch."%")->paginate($this->sel),

            'counts'=> prodect::count(),
            "data1"=>customer::get()
        ]);
    }
    public function restinput(){

        $this->getdes = "";
    }
    public function getval()
    {
        $this->resetval();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function resetval(){
        $this->prodect_name = "";
        $this->prodect_price = "";
        $this->taker_id ="";
        $this->taker_phone ="";
        $this->taker_name ="";
        $this->precent ="";
        $this->prem_lemt ="";
        $this->amount_pay ="";
        $this->rem_amount ="";
        $this->manthpay ="";
        $this->date = "";
        $this->customer_name = "";
        $this->descrption = "";
    }
}
