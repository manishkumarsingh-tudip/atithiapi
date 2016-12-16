<?php
namespace App\Http\Middleware;

use App\Helpers\ApiConstant;
use App\Http\Controllers\AppController;
use App\Models\User;
use App\Models\UserAuthModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Closure;

class authenticateUser extends AppController{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $headerInfo = $request->header();
        $authorization = $headerInfo['authorization'][0] ?? '';
        $auth_token = explode(' ', $authorization);
        $auth_token = $auth_token[1] ?? '';

        if(empty($auth_token))
        {
            return $this->returnableResponseData(array(), ApiConstant::AUTHENTICATION_FAILED);
        }

        $user = new UserAuthModel();
        $authenticatedUser = $user->getUserByAuthToken($auth_token);
        if(!$authenticatedUser)
        {
            return $this->returnableResponseData(array(), ApiConstant::AUTHENTICATION_FAILED);
        }
        $request->auth_token = $auth_token;
        $uri = $request->getBaseUrl();
        $host = $request->getHost();
        $basePath = 'http://'.$host.$uri;
        $request->rootUrl = $basePath;
        $request->user = $authenticatedUser;
        return $next($request);
    }

}