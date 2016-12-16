<?php

namespace App\Http\Controllers;

use App\Models\visitorsModel;
use Illuminate\Http\Request;
use App\Helpers\ApiConstant;
use App\Helpers\AppUtility;
use App\BaseModels\BaseUserModel;
use App\BaseModels\BaseUserAuthModel;
use App\Models\UserAuthModel;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Pipes\AbstractPipes;

class LoginController extends AppController
{
    //


    public function login(Request $request){

        $loginData  = $request->input();



        $userData['email'] = $loginData['email'];
        $userData['password'] = $loginData['password'];
        //$userData['isUser'] = isset($loginData['userType']) ? $loginData['userType'] : null;
        $error = null;
        $error = $this->validateLoginParams($userData['email'], $userData['password']);
        if(!empty($error))
        {

            return $this->returnableResponseData($userData, $error);
        }
        try
        {


                    $userDbPassword = BaseUserModel::where('email',$userData['email'])->first();
                    if(!empty($userDbPassword))
                    {


                        $result =  BaseUserModel::where('email',$userData['email'])->where('password',$userData['password'])->first();
                        if($result)
                        {
                            $userData['id']=$result->id;

                            $userAuthModelObj = new UserAuthModel();
                            $userAuthModelObj->saveAuthToken($userData);

                            $userData = array('message' => ApiConstant::LOGGED_IN_SUCCESSFULLY,
                                'auth_token' => $userAuthModelObj['auth_token']

                            );

                        }
                        else
                        {
                            $error = ApiConstant::INVALID_USERNAME_PASSWORD;
                        }
                    }
                    else
                    {
                        $error = ApiConstant::INVALID_USERNAME_PASSWORD;
                    }
        }
        catch (\Exception $e)
        {
            return $this->returnableResponseData($userData, ApiConstant::EXCEPTION_OCCURED, ApiConstant::ERROR_LOGIN);
        }
            return $this->returnableResponseData($userData, $error);
    }





    public function validateLoginParams($email, $password){
        $error = false;
        if (AppUtility::isNotSetOrEmpty($email)) {
            $error = ApiConstant::EMPTY_EMAIL;
        } elseif (!AppUtility::check_email_address($email)) {
            $error = ApiConstant::EMAIL_NOT_VALID;
        } elseif (AppUtility::isNotSetOrEmpty($password)) {
            $error = ApiConstant::EMPTY_PASSWORD;
        }
        return $error;
    }

    public function logout(Request $request){
        $headerInfo = $request->header();
        $authorization = $headerInfo['authorization'][0] ?? '';
        $auth_token = explode(' ', $authorization);
        $auth_token = $auth_token[1] ?? '';
        $user = new UserAuthModel();
        $authenticatedUser = $user->getUserByAuthToken($auth_token);
        $error = null;
        $userData = array();
        if(!empty($authenticatedUser['id_user']))
        {
            try
            {
                if (!empty($auth_token))
                {
                    $userDbAuthToken = BaseUserAuthModel::where('auth_token', $auth_token)->where('id_user',$authenticatedUser['id_user'])->delete();

                    if ($userDbAuthToken)
                    {
                        $userData = array('code' => ApiConstant::HTTP_RESPONSE_CODE_SUCCESS,
                            'message' => ApiConstant::LOGGED_OUT_SUCCESSFULLY,
                        );
                    }
                    else
                    {
                        $error = ApiConstant::ERROR_LOGOUT;
                    }
                }
            }
            catch (\Exception $e)
            {
               $error = ApiConstant::EXCEPTION_OCCURED;
            }
        }
        return $this->returnableResponseData($userData, $error);
    }

    public function sample(Request $request)
    {
        $headerInfo = $request->header();
        $authorization = $headerInfo['authorization'][0] ?? '';
        $auth_token = explode(' ', $authorization);
        $auth_token = $auth_token[1] ?? '';
        $user = new UserAuthModel();
        $authenticatedUser = $user->getUserByAuthToken($auth_token);
        $response = null;
        $error= null;
        $visitor= $request->input();
        if(!empty($authenticatedUser['id_user']))
        {
            if($visitor['name']!=null && $visitor['email'])
            {
                try
                {
                    //object model
                    $response;// =object->save($visitor); //
                    if($response==ApiConstant::EXCEPTION_OCCURED || $response==ApiConstant::RECORD_NOT_EXIST)
                    {
                        $error =$response;
                    }
                }
                catch (\Exception $e)
                {
                    $error = ApiConstant::EXCEPTION_OCCURED;
                }
            }
            else
            {
                $error = ApiConstant::PARAMETER_MISSING;
            }
        }
        else
        {
            $error = ApiConstant::AUTHENTICATION_FAILED;
        }
        return $this->returnableResponseData($response,$error);
    }
}
