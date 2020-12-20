<?php

namespace App\Http\Livewire;

use App\customer;
use App\premmanth;
use App\prodect;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Createpro extends Component
{

    public   $prodect_name;
    public $customer_name;
    public $date;
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




    public function updated($field)
    {
        $this->validateOnly($field,[
            'prodect_name' => 'required|unique:prodects|max:250|min:3',
            'customer_name' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'prodect_price' => 'required',
            'precent' => 'required',
            'rem_amount' => 'required',
            'prem_lemt' => 'required',
            'manthpay' => 'required',
            'descrption' => 'max:450'

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
                 'descrption.max' => 'الحد المسموح به  450حرف',

        ]);
    }
    public function create(){




                $this->validate([
                    'prodect_name' => 'required|unique:prodects|max:250|min:3',
                    'customer_name' => 'required',
                    'date' => 'required|date_format:Y-m-d',
                    'prodect_price' => 'required',
                    'precent' => 'required',
                    'rem_amount' => 'required',
                    'prem_lemt' => 'required',
                    'manthpay' => 'required',
                    'descrption' => 'max:450'



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
                    'descrption.max' => 'الحد المسموح به  450حرف',


                ]);

               /*$getex= new carbon();
               $getex->parse($this->date);
                $getex->isoFormat('YYYY-MM-DD');*/
        $data = [
            'prodect_name' => $this->prodect_name,
            'prodect_price' => $this->prodect_price,
              'date' =>  $this->date,
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
                prodect::create($data);
             session()->flash("message", "تم اضافه بيانات الصنف بنجاح🙂");



                return redirect()->to('/prodect');

    }
    public function render()
    {
        $this->mount();
        $this->calk();

        return view('livewire.createpro',['data' => customer::get()]);

    }




}
