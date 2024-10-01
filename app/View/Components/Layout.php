<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component {
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $showNav = "true",
        public string $showAside = "true",
        public string $bodyOverflowHidden = "false"

    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.layout');
    }
}
