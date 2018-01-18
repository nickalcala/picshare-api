<?php
namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiController;
use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * Class LoginController
 * 
 * @package App\Http\Controllers\Api\Auth
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-19-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
class LoginController extends ApiController
{
    public function login(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->unauthorized('Invalid Credentials');
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->error('Could Not Create Token');
        }

        /* @var User $user */
        $user = JWTAuth::toUser($token);

        // all good so return the token
        return response()->json(array_merge($user->toArray(), compact('token')));
    }
}