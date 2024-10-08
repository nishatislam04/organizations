<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class CloseButton extends Component {
    public $route = "";

    function redirectToRoute() {
        return Redirect::route($this->route);
    }
    public function render() {
        return view('livewire.close-button');
    }
}
