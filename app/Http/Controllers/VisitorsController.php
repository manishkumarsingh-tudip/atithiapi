<?php

namespace App\Http\Controllers;

use App\BaseModels\BaseVisitorsModel;
use App\Models\visitorsModel;
use Illuminate\Http\Request;
use App\Helpers\ApiConstant;
use App\Helpers\AppUtility;
use App\BaseModels\BaseUserModel;
use App\BaseModels\BaseUserAuthModel;
use App\Models\UserAuthModel;


class VisitorsController extends AppController
{
    public function visitors(Request $request)
    {
        $headerInfo = $request->header();
        $authorization = $headerInfo['authorization'][0] ?? '';
        $auth_token = explode(' ', $authorization);
        $auth_token = $auth_token[1] ?? '';
        $user = new UserAuthModel();
        $authenticatedUser = $user->getUserByAuthToken($auth_token);
        // $response = null;
        $visitorsData = $request->input();
        $error= null;
        // $visitor= $request->input();
        if(!empty($authenticatedUser['id_user']))
        {
            //  $error = null;

            print_r("visitors");
            $visitors['email'] = $visitorsData['email'] ?? '';
            $visitors['name'] = $visitorsData['name'] ?? '';
            $visitors['phone_no'] = $visitorsData['phone_no'] ?? '';
            $visitors['in_time'] = $visitorsData['in_time'] ?? '';
            $visitors['user_id'] = $authenticatedUser['id_user'];
            if (!empty($visitors)) {
                // DB::beginTransaction();
                try{
                    $visitorsModelObj = new visitorsModel();
                    //print_r("before calling function");
                    $visitorsDetails = $visitorsModelObj->saveVisitorsDetails($visitors);


                    //   $user['id_user'] = isset($userDetails) ? $userDetails : null;
                    $visitors['ext'] = isset($visitorsData['ext']) ? $visitorsData['ext'] : "";

                    $visitors['phone_no'] = isset($visitorsData['phone_no']) ? $visitorsData['phone_no'] : "";

                    $arr = array('number'=>"".$visitors['phone_no']."",
                        'ext'=>"".$visitors['ext']."",
                    );
                    $arr = json_encode($arr);
                    $visitors['phone_no'] = $arr;

                    //   return $this->returnableResponseData($visitorsData, $error);

                }catch(\Exception $e){
                    //   DB::RollBack();
                    print_r($e->getMessage());
                    return ApiConstant::EXCEPTION_OCCURED;
                }
            }
        }
        else
        {
            $error = ApiConstant::AUTHENTICATION_FAILED;
        }

        return $this->returnableResponseData($visitorsData, $error);
    }
    public function view(Request $request)
    {
        $headerInfo = $request->header();
        $authorization = $headerInfo['authorization'][0] ?? '';
        $auth_token = explode(' ', $authorization);
        $auth_token = $auth_token[1] ?? '';
        $user = new UserAuthModel();
        $authenticatedUser = $user->getUserByAuthToken($auth_token);
        $response = null;
        $error= null;
       // $visitor= $request->input();
        if(!empty($authenticatedUser['id_user']))
        {

            $visitor =new visitorsModel();
            $response=$visitor -> viewVisitors($authenticatedUser['id_user']);
          //  $response= BaseVisitorsModel::where('user_id',$authenticatedUser['id_user'])->get();

        }
        else
        {
            $error = ApiConstant::AUTHENTICATION_FAILED;
        }
        return $this->returnableResponseData($response,$error);
    }
    public function updateVisitor(Request $request)

    {
        $headerInfo = $request->header();
        $authorization = $headerInfo['authorization'][0] ?? '';
        $auth_token = explode(' ', $authorization);
        $auth_token = $auth_token[1] ?? '';
        $user = new UserAuthModel();
        $authenticatedUser = $user->getUserByAuthToken($auth_token);
        $response = null;
        $error= null;
        // $visitor= $request->input();
        if(!empty($authenticatedUser['id_user']))
        {
             $data = $request->input();
                    // $user = $request->user;
                 //    $error  = null;
                // $returnData  = null;
            $UpdateData['id']=$data['id']??'';
            $UpdateData['user_id']=$data['user_id']??'';
            $UpdateData['name'] =$data['name']??'';
            $UpdateData['email'] =$data['email']??'';
            $UpdateData['in_time'] =$data['in_time']??'';
            $UpdateData['out_time'] =$data['out_time']??'';
            $UpdateData['phone_no'] =$data['phone_no']??'';
            if(!empty($UpdateData['id']) || !empty($UpdateData['email']))
        {
            $user = BaseVisitorsModel::where('id',$UpdateData['id'])->first();
                    print_r($user['phone_no'].$user['email']." <br>".$user['id']);
            if($user)
            {
                if($UpdateData['email'] != $user['email'])
                {

                        $updateEmail = BaseVisitorsModel::where('id',$UpdateData['id'])->update(['email'=>$UpdateData['email']]);
                        if(!$updateEmail)
                        {
                            $error = ApiConstant::ERROR_EMAIL_UPDATE;
                        }
                }
                if($UpdateData['phone_no'] != $user['phone_no'])
                {

                    $updatePhone = BaseVisitorsModel::where('id',$UpdateData['id'])->update(['phone_no'=>$UpdateData['phone_no']]);
                    if(!$updatePhone)
                    {
                        $error = ApiConstant::INVALID_PHONE_NUMBER_TYPE;
                    }
                }
                if($UpdateData['name'] != $user['name'])
                {

                    $updateName = BaseVisitorsModel::where('id',$UpdateData['id'])->update(['name'=>$UpdateData['name']]);
                    if(!$updateName)
                    {
                        $error = ApiConstant::ERROR_NAME_NOT_SAVED;
                    }
                }
                if($UpdateData['in_time'] != $user['in_time'])
                {

                    $updateInTime = BaseVisitorsModel::where('id',$UpdateData['id'])->update(['in_time'=>$UpdateData['in_time']]);
                    if(!$updateInTime)
                    {
                        $error = ApiConstant::ERROR_INTIME_NOT_UPDATE;
                    }
                }
                if($UpdateData['out_time'] != $user['out_time'])
                {

                    $updateOutTime = BaseVisitorsModel::where('id',$UpdateData['id'])->update(['out_time'=>$UpdateData['out_time']]);
                    if(!$updateOutTime)
                    {
                        $error = ApiConstant::ERROR_OUTTIME_NOT_UPDATE;
                    }
                }

            }
        }

            $updateObj = new visitorsModel();
            $result = $updateObj->updateVisitors($UpdateData);
            $response =array('data'=>$result,'message'=>ApiConstant::UPDATED_SUCCESSFULLY);

        }
        else
        {
            $error = ApiConstant::AUTHENTICATION_FAILED;
        }

        return $this->returnableResponseData($response, $error);

    }
    public function deleteVisitor(Request $request)

    {
        $headerInfo = $request->header();
        $authorization = $headerInfo['authorization'][0] ?? '';
        $auth_token = explode(' ', $authorization);
        $auth_token = $auth_token[1] ?? '';
        $user = new UserAuthModel();
        $authenticatedUser = $user->getUserByAuthToken($auth_token);
        $response = null;
        $error= null;
        // $visitor= $request->input();
        if(!empty($authenticatedUser['id_user']))
        {
            $data = $request->input();
            // $user = $request->user;
            //    $error  = null;
            // $returnData  = null;
            $Deletedata['id']=$data['id']??'';
            print_r($Deletedata['id']." <br>");
            if(!empty($Deletedata['id']) || !empty($authenticatedUser['id_user']))
            {
                print_r($authenticatedUser['id_user']." <br>");
                $Deletedata['id_user']=$authenticatedUser['id_user'];
                $deleteObj = new visitorsModel();
                $result = $deleteObj->deleteVisitors($Deletedata);
                $response =array('data'=>$result,'message'=>ApiConstant::FILE_DELETED);


            }

        }
        else
        {
            $error = ApiConstant::AUTHENTICATION_FAILED;
        }

        return $this->returnableResponseData($response, $error);

    }
}
