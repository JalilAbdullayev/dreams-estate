<?php

namespace App\Http\Controllers;

use App\Http\Requests\FAQRequest;
use App\Models\FAQ;
use App\Traits\SetData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FAQController extends Controller {
    use SetData;

    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        $faqs = FAQ::orderBy('order')->get();
        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FAQRequest $request): RedirectResponse {
        FAQ::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'order' => FAQ::count() > 0 ? FAQ::latest('order')->first()->order + 1 : 1
        ]);
        return redirect()->route('admin.faq.index')->withSuccess('FAQ created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FAQ $faq) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FAQ $faq): View {
        return view('admin.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FAQRequest $request, FAQ $faq): RedirectResponse {
        $faq->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0
        ]);
        return redirect()->route('admin.faq.index')->withSuccess('FAQ updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $faq): JsonResponse {
        $faq->delete();
        return response()->json(['success' => true]);
    }

    public function sort(): void {
        $this->changeOrder(FAQ::class);
    }

    public function status(): void {
        $this->changeStatus(FAQ::class);
    }
}
