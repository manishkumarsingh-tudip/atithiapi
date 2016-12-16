<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\BaseModels\BaseUserModel;

use App\Helpers\ApiConstant;
use App\Helpers\AppUtility;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\DB;
class userModel extends BaseUserModel
{
    //
    public function saveUserDetails($user)
        {
            $returnData = null;

            $isUserAlreadyExist = BaseUserModel::where('email', $user['email'])->first();

            if (!empty($isUserAlreadyExist)) {
                $returnData = ApiConstant::EMAIL_ALREADY_EXIST;
            }
            else
            {
                try {
                    $this->password = $user['password']??'';
                    $email = isset($user['email']) ? AppUtility::check_email_address($user['email']) : null;
                    if ($email) {
                        $this->email = $user['email']??'';
                        $this->name = $user['name']??'';
                        //  $this->phone_no = $user['phone_no']??'';
                        //  $this->is_user = $user['isUser']??'';

                        /*BaseUserModel::where('email',$data['email'])->update([
                            'name'=>$data['name']
                        ]);
                        */
                        $this->password = $user['password'];
                        //  $this->email=$user['email'];
                        //insert();
                        if ($this->save()) {

                            $ret = $this->id;

                            DB::table('user_role')->insert(['id_user' => $ret, 'user_role_id' => 2]);

                        } else {
                            $returnData = ApiConstant::DATA_NOT_SAVED;
                        }

                    }
                }
                catch (\Exception $e)
                    {
                    return ApiConstant::EXCEPTION_OCCURED;
                     }
            }
            return $returnData;
        }



}
