<?php

namespace App\Http\Controllers;

use App\Helpers\ApiConstant;
use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\userAuthModel;
use App\Models\visitorsModel;

class UserController extends AppController
{
  public function display()
  {
     print_r('hello my first web page');
  }
  public function signUp2()
  {
     //print_r('hello my 2nd web page');


  }
  /*
 * sample json of parameter -signUp
 * {
"firstName":"firstName",
"lastName":"lastName",
"email":"abc@def.com",
"password":"password",
"phoneNumber":8989898990,
"userType":"General Contractor",
"userRole":"admin",
"ext":"2"
}
 * */
    public function signUp(Request $request)
    {
            $error = null;
            $userData = $request->input();
            $user['email'] = $userData['email'] ?? '';
            $user['name'] = $userData['name'] ?? '';
            $user['phone_no'] = $userData['phone_no'] ?? '';
        $user['password'] = $userData['password'] ?? '';

            if (!empty($user)) {

                try{
                    $userModelObj = new userModel();
                    print_r("before calling function");
                    $userDetails = $userModelObj->saveUserDetails($user);
                    if ($userDetails == ApiConstant::EMAIL_ALREADY_EXIST || $userDetails == ApiConstant::DATA_NOT_SAVED || $userDetails == ApiConstant::EMAIL_NOT_VALID) {
                        $error =  $userDetails;

                    }
                    else{

                      //  $userDetails == ApiConstant::DATA_NOT_SAVED;
                        // DB::commit();
                        $loginuser= new LoginController();
                        $loginuserob = $loginuser ->login($request);
                        if($loginuserob)
                        {
                            return $loginuserob;
                        }
                        else
                        {
                            $error = ApiConstant::ERROR_LOGIN;
                        }

                    }

                    return $this->returnableResponseData($userData, $error);

                }catch(\Exception $e){

                    print_r($e->getMessage());
                    return ApiConstant::EXCEPTION_OCCURED;
                }
            }
    }




}
