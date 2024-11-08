<?php

namespace App\Http\Controllers;

class AdminController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke() {
        return view('admin.index');
    }
}
