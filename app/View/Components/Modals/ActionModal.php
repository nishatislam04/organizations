<?php

namespace App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionModal extends Component {
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $method = "POST",
        public string $header,
        public string $type,
        public string $confirm = "Yes, I am sure", // confirm btn text
        public string $cancel = "No, cancel", // cancel btn text
        public string $action
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.modals.action-modal');
    }
}
