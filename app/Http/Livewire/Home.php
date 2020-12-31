<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component

{

    public $tes;
    public $tes1;
       public $dater;

       public $date2;
       public function getval(){

        dd($this->dater);
       } 

    public function render()
    {
        return view('livewire.home');
    }
}
