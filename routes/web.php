<?php
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::post('/login', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response(['msg' => $validator->errors()->first()], 400);
    }

    $email = $request->email;
    $password = $request->password;

    $user = User::where('email', $email)->first();
    if ($user && password_verify($password, $user->password)) {
        return $user->createToken('api')->plainTextToken;
    }

    return response(['msg' => 'Email or password incorrect'], 401);
});
