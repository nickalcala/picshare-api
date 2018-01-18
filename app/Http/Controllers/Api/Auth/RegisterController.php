<?php
namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiController;
use Picshare\Domain\User;

/**
 * Class RegisterController
 *
 * @package App\Http\Controllers\Api\Auth
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-19-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
class RegisterController extends ApiController
{
    
    /**
     * Register a user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $request = \Request::all();
        $validator = \Validator::make($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'min:6|confirmed'
        ]);
        if ($validator->fails()) {
            return $this->unprocessable($validator->messages());
        }
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return $this->success(true);
    }
}