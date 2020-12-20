<?php

namespace App\Http\Livewire;
use       App\customer;


use Livewire\Component;
use Livewire\WithPagination;

class Grop extends Component
{
    use WithPagination;

    public $name ="";
    public $date;
    public $phone;
    public $idnumber;
    public  $dis ="";
    public $serch ="";
    public $sel = "10";
    public $upid;
    public  $order = 'desc';
    protected $listeners=[
        'restformcat'

    ];
    public function updated($field)
    {
        $this->validateOnly($field,[
            'name' => 'required|unique:customers|max:250|min:3',
            'dis' => 'max:500',
            'date' => 'required'
        ],[
            'name.required'=> 'اسم العميل مطلوب',
            'name.min'=> 'اسم العميل لابد ان لا يقل عن 2 احرف',
            'name.unique'  => 'اسم العميل مسجل من قبل',
            'name.max'      => ' الحد الاقصى للحروف 250 حرف',
            'dis.max'       =>'الحد الاقصى للملاحظات 500حرف',
            'date.required' => 'التاريخ مطلوب'


        ]);
    }

    public function create(){

         $this->validate([
             'name' => 'required|unique:customers|max:250|min:3',
             'dis' => 'max:500',
             'date' => 'required'
         ],[
             'name.required'=> 'اسم العميل مطلوب',
             'name.min'=> 'اسم العميل لابد ان لا يقل عن 2 احرف',
             'name.unique'  => 'اسم العميل مسجل من قبل',
             'name.max'      => ' الحد الاقصى للحروف 250 حرف',
             'dis.max'       => 'الحد الاقصى للملاحظات 500حرف',
             'date.required' => 'التاريخ مطلوب'


         ]);
       customer::create([
           'name' => $this->name,
           'phone' => $this->phone,
           'idnumber' => $this->idnumber,
           'dis'   =>$this->dis,
           'date'  => $this->date

       ]);
        $this->restinput();

        $this->emit('create');
        session()->flash("message","تم اضافه بياناتالعميل بنجاح🙂");

    }
    public function render()
    {


        return view('livewire.grop',['data' => $this->serch == "" ? customer::orderBy("id",$this->order)->paginate($this->sel):customer::where("name","like","%".$this->serch."%")->paginate($this->sel),
            'counts'=> customer::count()
            ]);
    }
    public function edit($ids){

        $getdata = customer::find($ids);
        $this->upid= $ids;
        $this->name= $getdata->name;
        $this->phone= $getdata->phone;
        $this->idnumber= $getdata->idnumber;
        $this->dis= $getdata->dis;


    }
    public function update(){
  $this->validate([
            'name' => 'required|max:250|min:unique:customers,name,'.$this->upid,
            'dis' => 'max:500'

        ],[
            'name.required'=> 'اسم العميل مطلوب',
            'name.min'=> 'اسم العميل لابد ان لا يقل عن 3 احرف',
            'name.unique'  => 'اسم العميل مسجل من قبل',
            'name.max'      => ' الحد الاقصى للحروف 250 حرف',
            'dis.max'       =>  'الحد الاقصى المسموح به هو 500 حرف'
        ]);
        $data = customer::findOrFail($this->upid);
        $data->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'idnumber' => $this->idnumber,
            'dis'   =>$this->dis

        ]);
        $this->restinput();
        $this->emit('update');
        session()->flash("message","تم تعديل بيانات العميل بنجاح🙂");
    }
    public function delete(){

        customer::destroy($this->upid);
        $this->restinput();
        $this->emit('del');
        session()->flash("message","تم حذف بيانات  العميل بنجاح😮");
    }
    public function restformcat()
    {
        $this->restinput();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function restinput(){

        $this->name = "";
        $this->phone = "";
        $this->idnumber = "";
        $this->dis = "";
        $this->date = "";
    }
}
