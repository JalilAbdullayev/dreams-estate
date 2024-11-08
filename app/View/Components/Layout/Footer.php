<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component {
    /**
     * Create a new component instance.
     */
    public function __construct() {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        $links = [
            ['name' => 'Home', 'url' => 'home'],
            ['name' => 'Sales', 'url' => 'sales'],
            ['name' => 'Blog', 'url' => 'blog'],
            ['name' => 'Contact', 'url' => 'contact'],
            ['name' => 'About', 'url' => 'about'],
            ['name' => 'FAQ', 'url' => 'faq'],
        ];
        return view('components.layout.footer', compact('links'));
    }
}
