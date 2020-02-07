<?php

namespace App\Api\V1\Controllers\Auth;

use App\Device;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\Verification;
use Auth;
use Browser;
use Carbon\Carbon;
use function Functional\true;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use JWTAuth;
use Mail;
use Setting;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthController extends Controller
{

    /**
     * @group Auth
     *
     * Get authenticated user details and auth credentials.
     *
     * @return JSON
     */
    public function getAuthenticatedUser(){
        if (Auth::check()) {
            $user = Auth::user();
            $token = JWTAuth::fromUser($user);

            return response()->success(compact('user', 'token'));
        } else {
            return response()->error('unauthorized', 401);
        }
    }


    /**
     *
     * @group Auth
     * @bodyParam phone string required phone number of the user
     * @bodyParam email string required email of the user
     * @bodyParam password string password of the user
     *
     * Authenticate user.
     *
     * @param Instance Request instance
     *
     * @return JSON user details and auth credentials
     */
    public function signin(Request $request){

        $credentials = $request->only('email', 'password');
        $email=isset($credentials["email"])?$credentials["email"]:null;
        if($email==null)
            return response()->json(['error' => 'missing login'], 403);
        $validator = Validator::make(['email'=>$email], ['email'=>'email']);
        if($validator->fails()){
            return response()->json(['error' => 'invalid email'], 422);
        }else{
            $user = User::where('email', '=', $email)->first();
        }


        if(!isset($user))
            return response()->error(trans('auth.failed'), 401);

        /* if (isset($user->email_verified) && $user->email_verified == 0) {
             return response()->error('Email Unverified');
         }*/

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->error(trans('auth.failed'), 401);
            }
        } catch (\JWTException $e) {
            return response()->error('Could not create token', 500);
        }


        $user = Auth::user();
        $token = JWTAuth::fromUser($user);

        /*$abilities = $this->getRolesAbilities();
        $userRole = [];

        foreach ($user->roles as $role) {
            $userRole [] = $role->name;
        }*/
        $user = User::with('customer')->find($user->id);
        return response()->success(compact('user', 'token'));
//        return response()->success(compact('user', 'token','abilities', 'userRole'));
    }

    /**
     *
     * @group Auth
     * @bodyParam phone string required phone number of the user
     * @bodyParam email string required email of the user
     * @bodyParam password string password of the user
     * @bodyParam device_tokens array the user devices tokens
     * @bodyParam settings json key value array user settings
     *
     * Create new user.
     *
     * @param Instance Request instance
     *
     * @return JsonResponse user details and auth credentials
     */
    public function signup(Request $request)
    {

        $rule = [
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6|confirmed',
            'name'   => 'required|max:255',
        ];


        $validator = Validator::make($request->all(), $rule);

        if($validator->fails()){
            return Response::json($validator->errors(), 422);

        }else{
            $verificationCode = Str::random(40);
            $user = new User();
            $user->email = trim(strtolower($request->email));
            $user->name = trim(strtolower($request->name));
            $user->password = $request->password;
            $user->save();

            $token = JWTAuth::fromUser($user);

            return response()->success(compact('user', 'token'));
        }


    }

    public function updateMe(Request $request){
        $rule = [
            'device_tokens' => 'array',
        ];
        $user = Auth::user();
        if( $request->email !=null ){
            $rule['email'] = 'required|email|unique:users,email,'.$user->id;
        }
        $validator = Validator::make($request->all(), $rule);

        if($validator->fails()){
            return Response::json($validator->errors(), 422);
        }else{
            $user = Auth::user();

            if(isset($request->settings)){
                foreach ($request->settings as  $key=>$val){
                    Setting::set($key,$val, $user->id);
                }
                Setting::save($user->id);
            }

            $user->update($request->all());
            return response()->success(compact('user'));
        }
    }

    public function refresToken(){
        $token = JWTAuth::getToken();

        if (! $token) {
            throw new BadRequestHttpException('Token not provided');
        }

        try {
            $token = JWTAuth::refresh($token);
        } catch (TokenInvalidException $e) {
            throw new AccessDeniedHttpException('The token is invalid');
        }

        //$user = Auth::user();
        return response()->success(compact('token'));
    }



    public function putMe(Request $request)
    {
        $user = Auth::user();
        $rule = [
            'name'       => 'min:3|max:255',
            'email'      => 'required|email|unique:users,email,'.$user->id,
            'password'   => 'min:6|confirmed'
        ];

        if($request->password){
            $rule['current_password'] = 'required|min:5';
        }

        $validator = Validator::make($request->all(), $rule);

        if($validator->fails()){
            return response()->error($validator->errors(), 422);
        }



        $user->name = trim($request->name);
        $user->email = trim(strtolower($request->email));



        if ($request->has('current_password')or $request->has('password')) {
            Validator::extend('hashmatch', function ($attribute, $value, $parameters) {
                return Hash::check($value, Auth::user()->password);
            });

            $rules = [
                'current_password' => 'required|hashmatch:data.current_password',
                'password' => 'required|min:5|confirmed',
                'password_confirmation' => 'required|min:5',
            ];

            $payload = $request->only('current_password', 'password', 'password_confirmation');

            $messages = [
                'hashmatch' => 'Invalid Password',
            ];

            $validator = app('validator')->make($payload, $rules, $messages);

            if ($validator->fails()) {
                return response()->error($validator->errors(), 422);
            } else {
                $user->password = Hash::make($request['password']);
            }
        }

        $user->save();
        return response()->success(compact('user'));
    }

    

}
