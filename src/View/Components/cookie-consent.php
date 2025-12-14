<?php

namespace MrShaneBarron\cookie-consent\View\Components;

use Illuminate\View\Component;

class cookie-consent extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('ld-cookie-consent::components.cookie-consent');
    }
}
