<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users.index', [
            'users' => User::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        if ($request->hasFile('image')) {
            $attributes['image'] = $this->storeImage($request);
        }

        User::create($attributes);

        return to_route('users.create')->with(
            'status',
            'User created successfully.'
        );
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $attributes = $request->validated();

        if ($request->hasFile('image')) {
            if ($user->image) {
                unlink($user->getImagePath());
            }

            $attributes['image'] = $this->storeImage($request);
        }

        $user->update($attributes);

        return redirect($user->getEditUrl())->with(
            'status',
            'User edited successfully.'
        );
    }

    public function destroy(User $user)
    {
        //
    }

    private function storeImage(FormRequest $request): string|false
    {
        return $request->file('image')->store('users', 'public');
    }
}
