<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $links = [
            ['name' => 'Ana Səhifə', 'url' => 'home'],
            ['name' => 'Bloq', 'url' => 'blog'],
            ['name' => 'Əlaqə', 'url' => 'contact'],
            ['name' => 'Haqqımızda', 'url' => 'about'],
            ['name' => 'TVS', 'url' => 'faq'],
        ];
        return view('components.layout.footer', compact('links'));
    }
}
