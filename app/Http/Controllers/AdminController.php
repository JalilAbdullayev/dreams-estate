<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View {
        return view('admin.index');
    }
}
