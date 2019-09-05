<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserValidation;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;
use DataTables;

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
        if (request()->ajax()) {
            $users = User::select(['id', 'name', 'username', 'email', 'email_verified_at']);

            return DataTables::of($users)
                    ->addColumn('show', function ($user) {
                        return '<a href="'.route('users.show', $user->id).'" class="label label-info"><i class="fa fa-eye"></i> Show</a>';
                    })
                    ->addColumn('edit', function ($user) {
                        return '<a href="'.route('users.edit', $user->id).'" class="label label-warning"><i class="fa fa-edit"></i> Edit</a>';
                    })
                    ->addColumn('delete', function ($user) {
                        return '<a href="#" class="label label-danger delete-btn" data-id="'.$user->id.'" data-name="'.$user->name.'" data-href="'.route('users.destroy', $user->id).'" data-toggle="modal" data-target="#modal-default"><i class="fa fa-trash"></i> Delete</a>';
                    })
                    ->editColumn('email_verified_at', function ($user) {
                        return $user->email_verified_at ? $user->email_verified_at->diffForHumans() : '-';
                    })
                    ->rawColumns(['show', 'edit', 'delete'])
                    ->make(true);
        }

        return view('users.index');
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
        //User::create($validated);

        return redirect()
                ->route('users.index')
                ->with('success', 'User created successfully!');
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
        $validated = $this->validation($request, $user->id)->validated();

        // hash password
        $validated['password'] = Hash::make($validated['password']);

        // update user
        $user->update($validated);

        return redirect()
                ->route('users.index')
                ->with('success', 'User updated successfully!');
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

        if (request()->ajax()) {
            return response()->json(['success', 'User deleted successfully!']);
        }

        return redirect()
                ->route('users.index')
                ->with('success', 'User deleted successfully!');
    }

    public function validation($request, $userId = null)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'username' => [
                                'required',
                                'alpha_dash',
                                'max:50',
                                Rule::unique('users', 'username')->ignore($userId)
                            ],
                'email'    => [
                                'required',
                                'email',
                                Rule::unique('users', 'email')->ignore($userId)
                            ],
                'password' => ['required', 'confirmed', 'min:8']
            ]);
        } catch (Exception $e) {
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
