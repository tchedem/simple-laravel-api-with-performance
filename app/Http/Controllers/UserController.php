<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userRepository;

    // we will need to use the interface in multiple places in our controller so we inject it via the constructor
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     */
    // this is auto-dependency injection
    public function index(GetUserRequest $request)
    // public function index(UserRepository $userRepository, GetUserRequest $request)
    {
        $users = $this->userRepository->getUsers($request);
        // $users = $userRepository->getUsers($request);
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($request->all());

        return response()->json($user, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
