<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Auth\Access\AuthorizationException;

class CredentialController extends Controller
{
    /**
     * Display a listing of the user's credentials.
     */
    public function index(Request $request)
{
    $query = Credential::query();

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('website', 'like', '%' . $request->search . '%')
              ->orWhere('username', 'like', '%' . $request->search . '%')
              ->orWhere('name', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    $credentials = $query->latest()->get();

    return view('credentials.index', compact('credentials'));
}


    /**
     * Show the form for creating a new credential.
     */
    public function create()
    {
        return view('credentials.create');
    }

    /**
     * Store a newly created credential in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'website' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string',
            'link' => 'nullable|url',
            'category' => 'nullable|string|max:50',
        ]);

        Credential::create([
            'user_id' => auth()->id(),
            'website' => $request->website,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Crypt::encryptString($request->password),
            'link' => $request->link,
            'category' => $request->category,
        ]);

        return redirect()->route('credentials.index')->with('success', 'Credential saved successfully.');
    }

    /**
     * Show the form for editing the specified credential.
     */
    public function edit(Credential $credential)
    {
        if ($credential->user_id !== auth()->id()) {
            throw new AuthorizationException;
        }

        $credential->decrypted_password = Crypt::decryptString($credential->password);

        return view('credentials.edit', compact('credential'));
    }

    /**
     * Update the specified credential in storage.
     */
    public function update(Request $request, Credential $credential)
    {
        if ($credential->user_id !== auth()->id()) {
            throw new AuthorizationException;
        }

        $request->validate([
            'website' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string',
            'link' => 'nullable|url',
            'category' => 'nullable|string|max:50',
        ]);

        $credential->update([
            'website' => $request->website,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Crypt::encryptString($request->password),
            'link' => $request->link,
            'category' => $request->category,
        ]);

        return redirect()->route('credentials.index')->with('success', 'Credential updated successfully.');
    }

    /**
     * Remove the specified credential from storage.
     */
    public function destroy(Credential $credential)
   {
    $credential->delete(); // Soft delete

    return redirect()->route('credentials.index')
        ->with('success', 'Credential moved to trash successfully.');
    }
    public function trash()
{
    $credentials = Credential::onlyTrashed()->get();
    return view('credentials.trash', compact('credentials'));
}

    public function restore($id)
{
    $credential = Credential::onlyTrashed()->findOrFail($id);
    $credential->restore();

    return redirect()->route('credentials.index')->with('success', 'Credential restored successfully!');
}

}
