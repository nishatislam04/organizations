<?php

namespace App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Flash extends Component {
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $key = "success"
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.modals.flash');
    }
}
