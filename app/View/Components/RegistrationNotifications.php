<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RegistrationNotifications extends Component
{

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.registration-notifications');
    }
}
