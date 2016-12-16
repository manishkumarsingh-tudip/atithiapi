<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfileModel extends Model
{
    //
    public function saveUserProfileDetails($user){
        $returnData = null;
        try{
            if(!empty($user)) {
                $this->id_user = $user['id_user'];
            //    $this->officeNumber = $user['phoneNumber'];
                $this->ext = $user['ext'];
                $this->name = $user['name'];
                  $this->email = $user['email'];
                    $this->phone_no = $user['phone_no'];
                $this->password  = $user['password'];
                //$this->id_accountmanager  = "1";
                if($this->save()){
                    $returnData = ApiConstant::USER_CREATED_SUCCESSFULLY;
                }
                else{
                    $returnData = ApiConstant::DATA_NOT_SAVED;
                }
            }
        }catch(\Exception $e){

            return ApiConstant::EXCEPTION_OCCURED;
        }
        return $returnData;
    }



}
