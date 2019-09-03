<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserValidation;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate input
        $validated = $this->validation($request)->validated();

        // hash password
        $validated['password'] = Hash::make($validated['password']);

        // create and send activation email
        event(new Registered(User::create($validated)));

        return redirect()
                ->route('users.index')
                ->with('success','User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // validate input
        $validated = $this->validation($request, $user)->validated();

        // hash password
        $validated['password'] = Hash::make($validated['password']);

        // update user
        $user->update($validated);

        return redirect()
                ->route('users.index')
                ->with('success','User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
                ->route('users.index')
                ->with('success','User deleted successfully!');
    }

    public function validation($request, $user = null)
    {
        try {

            $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'username' => [
                                'required', 
                                'alpha_dash', 
                                Rule::unique('users', 'username')->ignore($user ? $user->id: null)
                            ],
                'email' => [
                            'required', 
                            'email', 
                            Rule::unique('users', 'email')->ignore($user ? $user->id: null)
                        ],
                'password' => ['required', 'confirmed', 'min:8']
            ]);

        } catch(Exception $e) {
            // check if input has errors
            //if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            //}
        }

        return $validator;
    }
}
