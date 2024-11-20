<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class MessageController extends Controller {
    public function index() {
        if(auth()->user()->cannot('viewAny', Message::class)) {
            abort(403);
        }
        $messages = Message::all();
        return view('admin.messages.index', compact('messages'));
    }

    public function show(int $id): View {
        $message = Message::findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }

    public function store(MessageRequest $request) {
        Message::create($request->validated());
        return back()->withSuccess('Your message has been sent.');
    }

    public function delete(int $id, Message $message): JsonResponse {
        if(auth()->user()->cannot('delete', $message)) {
            abort(403);
        }
        $message->findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
