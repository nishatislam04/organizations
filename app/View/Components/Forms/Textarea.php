<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component {
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name = "",
        public string $row = "10",
        public string $col = "50",
        public string $id = "",
        public string $class = "",
        public string $placeholder = "enter texts"
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.forms.textarea');
    }
}
