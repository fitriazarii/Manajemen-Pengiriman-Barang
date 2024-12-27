<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index(): View
    {
        $users = User::latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * create
     * 
     * @return view
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * store
     * 
     * @param mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'name'           => 'required|max:10',
            'email'          => 'required',
            'password'       => 'required|max:255',
        ]);

        User::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
        ]);

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Successfully Created User!']);
    }

    /**
     * show
     * 
     * @param mixed $id
     * @return view
     */
    public function show(string $id): View
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * edit
     * 
     * @param mixed $id
     * @return view
     */
    public function edit(string $id): View
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * update
     * 
     * @param mixed $request
     * @param mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'name'           => 'required|max:10',
            'email'          => 'required',
            'password'       => 'nullable|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
        ]);

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Sucessfully Updated User!']);
    }

    /**
     * destroy
     * 
     * @param mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $users = User::findOrFail($id);
        $users->delete();

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Successfully Deleted User!']);
    }
}
