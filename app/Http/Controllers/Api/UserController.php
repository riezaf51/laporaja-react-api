<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new UserCollection(User::all());

        if ($data) {
            return ApiFormatter::createApi(200, $data, $data->count());
        } else {
            return ApiFormatter::createApi(400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'phonenumber' => 'numeric|required',
                'provinsi' => 'required',
                'kabkota' => 'required',
                'kecamatan' => 'required',
                'email' => 'required|unique:users,email|email:rfc,dns',
                'password' => 'min:8|required'
            ]);

            $user = User::create([
                'firstname' => ucwords(strtolower($request->firstname)),
                'lastname' => ucwords(strtolower($request->lastname)),
                'phonenumber' => $request->phonenumber,
                'provinsi' => ucwords(strtolower($request->provinsi)),
                'kabkota' => ucwords(strtolower($request->kabkota)),
                'kecamatan' => ucwords(strtolower($request->kecamatan)),
                'email' => $request->email,
                'password' => $request->password,
                'role' => "user"
            ]);

            $data = User::where('id','=',$user->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, $data);
            } else {
                return ApiFormatter::createApi(400);
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|unique:users,email|email:rfc,dns',
            'password' => 'min:8|required'
        ]);
        
        $user = User::findOrFail($id);
        if (Hash::check($request->password, $user->password)) {
            $user->email = $request->email;
            $user->save();
            return ApiFormatter::createApi(200, $user);
        } else {
            return ApiFormatter::createApi(400);
        }
        // try {
        //     $request->validate([
        //         'firstname' => 'required',
        //         'lastname' => 'required',
        //         'phonenumber' => 'numeric|required',
        //         'provinsi' => 'required',
        //         'kabkota' => 'required',
        //         'kecamatan' => 'required',
        //         'email' => 'required|email:rfc,dns',
        //         'password' => 'min:8|required'
        //     ]);

        //     $user = User::findOrFail($id);

        //     $user->update([
        //         'firstname' => ucwords(strtolower($request->firstname)),
        //         'lastname' => ucwords(strtolower($request->lastname)),
        //         'phonenumber' => $request->phonenumber,
        //         'provinsi' => ucwords(strtolower($request->provinsi)),
        //         'kabkota' => ucwords(strtolower($request->kabkota)),
        //         'kecamatan' => ucwords(strtolower($request->kecamatan)),
        //         'email' => $request->email,
        //         'password' => $request->password
        //     ]);

        //     $data = User::where('id','=',$user->id)->get();

        //     if ($data) {
        //         return ApiFormatter::createApi(200, $data);
        //     } else {
        //         return ApiFormatter::createApi(400);
        //     }
        // } catch (ValidationException $error) {
        //     return ApiFormatter::createApi(400);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $data = $user->forceDelete();
        
        if ($data) {
            return ApiFormatter::createApi(200, $data);
        } else {
            return ApiFormatter::createApi(400);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Email atau password salah'], 400);
        }
     
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user_id' => $user->id,
            'token' => $token,
            'user' => $user,
        ], 200);
        // if (auth()->attempt(request(['email', 'password']))) {
        //     $token = auth()->getUser()->createToken('auth_token')->plainTextToken();
        //     $user = auth()->getUser();
        //     return response()->json([
        //         'user_id' => $user->id(),
        //         'token' => $token,
        //         'user' => $user,
        //     ]);
        // } else {
        //     return response()->json(['message' => 'Email atau password salah']);
        // }
    }

    public function logout(Request $request)
    {   
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Berhasil log out',
        ]);
    }

    public function change_email(Request $request)
    {
        
    }
}
