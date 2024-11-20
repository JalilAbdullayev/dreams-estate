<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerMessageRequest;
use App\Models\CustomerMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class CustomerMessageController extends Controller {
    public function index() {
        if(auth()->user()->cannot('viewAny', CustomerMessage::class)) {
            $messages = CustomerMessage::whereReceiverId(auth()->user()->id)->get();
        } else {
            $messages = CustomerMessage::all();
        }
        return view('admin.messages.index', compact('messages'));
    }

    public function show(int $id): View {
        $message = CustomerMessage::findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }

    public function store(CustomerMessageRequest $request) {
        CustomerMessage::create($request->validated());
        return back()->withSuccess('Your message has been sent.');
    }

    public function delete(int $id, CustomerMessage $message): JsonResponse {
        if(auth()->user()->cannot('delete', $message)) {
            abort(403);
        }
        $message->findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
