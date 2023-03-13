<?php

namespace App\View\Components;

use App\Models\AucationHistory;
use Illuminate\View\Component;

class notification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $notif = AucationHistory::limit(5)->get();
        return view('components.notification', compact('notif'));
    }
}
