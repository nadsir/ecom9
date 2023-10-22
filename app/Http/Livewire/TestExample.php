<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestExample extends Component
{
    public $name='nader';
    public function changeName(){
        $this->name='bagher';

    }
    public function render()
    {
        return view('livewire.test-example');
    }
}
