<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use App\BaseModels;
use App\BaseModels\BaseVisitorsModel;
use App\Helpers\ApiConstant;
use App\Helpers\AppUtility;
use Illuminate\Database\Eloquent\Model;
use App\BaseModels\BaseUserRoleModel;


class visitorsModel extends BaseVisitorsModel
{


    public function saveVisitorsDetails($visitors)
    {
        $returnData = null;

        try {
            $this->phone_no= $visitors['phone_no'];
            $this->email= $visitors['email'];
            $this->name= $visitors['name'];

            $this->user_id=$visitors['user_id'];
            $this->save();
            //$returnData=BaseVisitorsModel::where('email', $visitors['email'])->first();
           /* $returnData->email = $visitors['email']??'';
            $returnData->name = $visitors['name']??'';
            $returnData->phone_no = $visitors['phone_no']??''*/;
          /*  $returnData->in_time = //$visitors['in_time'] ?? '';
            $returnData->out_time = "";*/
            //$returnData->user_id = 2;
           // DB::table('visitor')->where('email', 'mm@ww.cc')->update(['phone_no'=>$visitors['phone_no']]);
            //$returnData->save();
            //  $this->is_user = $user['isUser']??'';


           // print_r($returnData['email']);
/*
            if(!empty($returnData))
            {

            }*/



            //print_r('fffffffffff');

        } catch (\Exception $e) {
            print_r($e->getMessage());
            return ApiConstant::EXCEPTION_OCCURED;
        }

        return $returnData;

    }
    public function viewVisitors($user_id)
    {
       $checkadmin= DB::table('user_role')-> where('id_user',$user_id)->first();
        if($checkadmin->user_role_id == 1)
        {
           // print_r("i am in admin");
            $response= BaseVisitorsModel::all();
            return $response;
        }
        else
        {
            $response= BaseVisitorsModel::where('user_id',$user_id)->get();
            return $response;
        }

    }
    public function updateVisitors($data)
    {


        try {

            $result = null;
            $update = BaseVisitorsModel::where('id', $data['id'])->get();
            print_r($data['id']);
            return $update;
        } catch (\Exception $e) {
            return ApiConstant::EXCEPTION_OCCURED;
        }
    }
    public function deleteVisitors($data)
    {


        try {
            $checkadmin= DB::table('user_role')-> where('id_user',$data['id_user'])->first();
            if($checkadmin->user_role_id == 1)
            {
                 print_r("i am in admin");
                $deleted = BaseVisitorsModel::where('id', $data['id'])->delete();
                //$response= BaseVisitorsModel::all();
                return $deleted;
            }
            else {
                print_r($data['id'] . "manish <br>".$data['id_user']."user id");
                $result = null;

                $result= BaseVisitorsModel::where('id', $data['id'])->where('user_id', $data['id_user'])->first();
                if($result)
                {
                    $deleted = BaseVisitorsModel::where('id', $data['id'])->where('user_id', $data['id_user'])->delete();
                    //  print_r($data['id']);
                    return $deleted;
                }
                else
                {

                }
            }
        } catch (\Exception $e) {
            return ApiConstant::EXCEPTION_OCCURED;
        }
    }

}
