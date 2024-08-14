<?php

namespace App\Http\Controllers;

use App\Models\GuestMessage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Gate;

class GuestMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : Response
    {
        return Inertia::render('Guestbook/Index', [
            'guestmessages' => GuestMessage::with('user:id,name')->latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:200'
        ]);

        $request->User()->GuestMessage()->create($validated);
        
        return redirect(route('guestbook.index'));
    }

    public function update(Request $request, GuestMessage $guestMessage): RedirectResponse{
        Gate::authorize('update', $guestMessage);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        
        var_dump($validated);
        $guestMessage->update($validated);
 
        return redirect(route('guestbook.index'));
    }
}
