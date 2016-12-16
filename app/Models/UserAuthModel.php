<?php

namespace App\Models;

use App\BaseModels\BaseUserAuthModel;
use App\BaseModels\BaseUserModel;
use App\Helpers\ApiConstant;
use App\Helpers\AppUtility;

class UserAuthModel extends BaseUserAuthModel
{
    public function saveAuthToken($userData){
        try{
            if(!empty($userData)) {

                //$authtoken = bcrypt($userData['password'].$userData['email']);
                $this->id_user = $userData['id'];
                $auth_token=AppUtility::createUserAuthToken();
                $this->auth_token =$auth_token;
                if($this->save()){
                    return $this->auth_token;
                    }else{
                    return ApiConstant::DATA_NOT_SAVED;
                }
            }else{
                return false;
            }
        }catch(\Exception $e){
            throw new \Exception(AppUtility::getMessageForErrorCode(ApiConstant::DATA_NOT_SAVED), ApiConstant::DATA_NOT_SAVED);
        }
    }

    public function getUserByAuthToken($auth_token)
    {

        $user = BaseUserAuthModel::where('auth_token', $auth_token)->join('register','register.id','id_user')->first();
        //$updateTime = time();
        //$updateTime = date("Y-m-d H:i:s",$updateTime);
        //$updateLastsSeen=BaseUserModel::where('id',$user['id_user'])->update(['last_seen'=>$updateTime]);
        return $user;
    }
}