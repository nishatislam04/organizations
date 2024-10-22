<?php

namespace App\View\Components\Icon;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component {
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id = "",
        public string $class = "inline-block w-5 h-5",
        public string $fill = "gray",
        public string $icon = ""
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.icon.icon');
    }
}
