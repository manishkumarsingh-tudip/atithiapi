<?php
/**
 * Created by PhpStorm.
 * User: supravat
 * Date: 28/12/15
 * Time: 5:56 PM
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Mail;
use Swift_Attachment;

class AppUtility {

    /**
     * @param $str
     * @return bool
     */
    public static function sendsamplsEmail($template = null, $subject = null, $body = null, $to = null, $fromName = null, $fromEmail = null){

        $body = 'heloo guys this is first email';
        Mail::send('welcome', array('data' => $body), function ($message) {
            $fromEmail = 'himanshu.gupta@zibtek.com';
            $fromName = 'Himanshu';
            $to = 'himanshu.gupta@tudip.nl';
            $subject = 'test email';
            $message->from($fromEmail, $fromName);
            $message->to($to)->subject($subject);
        });
    }

    public static function sendEmail($template = null, $subject = null, $body = null, $to = null, $fromName = null, $fromEmail = null, $attachment =null, $path=null){
        Mail::send($template, array('data' => $body), function ($message) use ($to,$subject,$fromEmail,$fromName,$attachment,$path){
            $message->from($fromEmail, $fromName);
            $message->to($to)->subject($subject);
            if($attachment){
                $message->attach($attachment);
            }
        });
    }

    public static function isNotSetOrEmpty($str)
    {
        $return = false;
        if($str == null)
        {
            $return = true;
        }
        return $return;
    }

    /**
     * @param $firstName
     * @param $length
     * @return int
     */
    public static function compareStringLength($firstName, $length)
    {
        $returnVal = 0;
        if(self::checkStringLength($firstName) < $length)
        {
            $returnVal = -1;
        }
        elseif(self::checkStringLength($firstName) > $length)
        {
            $returnVal = 1;
        }
        return $returnVal;
    }

    /**
     * @param $str
     * @return int
     */
    public static function checkStringLength($str)
    {
        $length = strlen($str);
        return $length;
    }

    /**
     * @param $email
     * @return bool
     */
    public static function check_email_address($email) {
        $status = true;
        $space_pos = strpos($email,' ');
        $at_pos = strpos($email,'@');
        $stop_pos = strpos($email,'.', $at_pos);
        $more_stop = strpos($email, '.', ($stop_pos + 1));

        if(($at_pos === false) || ($stop_pos === false) || $more_stop || $space_pos) {
            $status = false;
        }
        else {
            if($stop_pos < $at_pos) {
                $status = false;
            }
            else {
                if (($stop_pos - $at_pos) == 1) {
                    $status = false;
                }
            }
        }
        return $status;
    }

    /**
     * @param $errorCode
     * @return int
     */
    public static function getHTTPStatusCodeForErrorCode($errorCode)
    {
        $statusCode = ApiConstant::HTTP_RESPONSE_CODE_SUCCESS;
        if (isset(ApiConstant::$httpErrorCodeMap[$statusCode]))
        {
            $statusCode = ApiConstant::$httpErrorCodeMap[$errorCode];
        }
        return $statusCode;
    }

    /**
     * @param $errorCode
     * @return mixed
     */
    public static function getMessageForErrorCode($errorCode)
    {
        $returnData = $errorCode;
        if (isset(ApiConstant::$english[$errorCode]))
        {
            $returnData = ApiConstant::$english[$errorCode];
        }
        return $returnData;
    }

    public static function createSalt($email)
    {
        $salt = md5($email);
        return $salt;

    }

    public static function getPasswordHash($salt, $password)
    {
        $hash = md5($salt.$password);
        return $hash;
    }

    public static function isValidPreviousDate($date)
    {
        $returnVal = false;
        $date = date_create($date);
        $preDate = date_format($date, ApiConstant::DATE_FORMAT);
        $currentDate = date(ApiConstant::DATE_FORMAT);
        if($preDate < $currentDate)
        {
            $returnVal = true;
        }
        return $returnVal;
    }

    public static function isValidDateFormat($date)
    {
        $returnVal = false;
        if (preg_match(ApiConstant::DATE_FORMAT_GRAMMAR, $date))
        {
            $returnVal = true;
        }
        return $returnVal;
    }

    /**
     * @return string
     */
    public static function createUserAuthToken()
    {
        $startTime = microtime();
        $userAuthToken = md5($startTime);
        return $userAuthToken;
    }

    public static function trimContent($str)
    {
        return trim($str);
    }

    public static function getDateFromDateObject($date)
    {
        if(is_object($date)){
            $date = (array)$date;
            $date = $date['date'];
            $date = explode('.', $date);
            $date = $date[0];
        }
        return $date;
    }

    public static function getResetToken()
    {
        return strtolower(str_random(8,'1234567890abcdefghijklmnopqrstuvwxyz'));
    }

    public static function dateFormat($date)
    {
        $date = date_create($date);
        $formattedDate = date_format($date, ApiConstant::DATE_FORMAT);
        return $formattedDate;
    }

    public static function mergeArray($primaryArray, $secondaryArray)
    {
        foreach($secondaryArray as $key => $data)
        {
            $primaryArray[$key] = $data;
        }
        return $primaryArray;
    }

    public static function prepareUserTableData($inputs)
    {
        $returnArray = array();
        $columns = array('first_name', 'last_name', 'birth_date', 'gender');
        foreach($inputs as $key => $input)
        {
            if(in_array($key, $columns))
            {
                $returnArray[$key] =  $input;
            }
        }
        if(isset($inputs['birth_date']))
        {
            $inputs['birth_date'] = AppUtility::reverseDateUsFormat($inputs['birth_date']);
            $returnArray["age"] = date_diff(date_create($inputs['birth_date']), date_create('today'))->y;
            $returnArray["birth_date"] = AppUtility::reverseDateUsFormat($returnArray['birth_date']);
        }

       return $returnArray;
    }

    public static function prepareAddressTableData($inputs)
    {
        $returnArray = array();
        $columns = array('contact', 'street', 'city', 'district', 'state', 'country', 'landmark', 'zip');
        foreach($inputs as $key => $input)
        {
            if(in_array($key, $columns))
            {
                $returnArray[$key] =  $input;
            }
        }
        return $returnArray;
    }

    public static function prepareProfileTableData($inputs)
    {
        $returnArray = array();
        $columns = array('fitness_interest', 'bmi', 'body_fat', 'do_smoke', 'exercise_per_week');
        foreach($inputs as $key => $input)
        {
            if(in_array($key, $columns))
            {
                $returnArray[$key] =  $input;
            }
        }
        return $returnArray;
    }

    public static function isValidBase64($imageBase64)
    {
        $returnVal = false;
        if (base64_encode(base64_decode($imageBase64, true)) === $imageBase64)
        {
            $returnVal = true;
        }
        return $returnVal;
    }

    public static function reverseDateUsFormat($date)
    {
        if($date)
        {
            $array = explode('-', $date);
            $newFormat = $array[1].'-'.$array[0].'-'.$array[2];
            $dateObj = date_create($newFormat);
            $formattedDate = date_format($dateObj, ApiConstant::DATE_FORMAT);
            return $formattedDate;
        }
    }

    public static function dateUsFormat($date)
    {
        if($date)
        {
            $array = explode(' ', $date);
            $dateOnly = explode('-', $array[0]);
            $newFormat = $dateOnly[1].'-'.$dateOnly[2].'-'.$dateOnly[0].' '.$array[1];
            return $newFormat;
        }
    }

    public static function calculateTimePassed($date)
    {
        $currentTime = new \DateTime();
        $pastDate = date_create($date);

        $postedBefore = date_diff($pastDate, $currentTime);
        $dateDiff = array('year' => $postedBefore->y,
            'month' => $postedBefore->m,
            'day' => $postedBefore->d,
            'hour' => $postedBefore->h,
            'minute' => $postedBefore->i,
            'second' => $postedBefore->s,
            'total_days' => $postedBefore->days,
        );
        return $dateDiff;
    }

    public static function dump($data)
    {
        echo'<pre>';
        print_r($data);
        echo'</pre>';
        die;
    }

    public static function validBase64Params($imageBase64)
    {
        $error = false;
        if(AppUtility::isNotSetOrEmpty($imageBase64))
        {
            $error = ApiConstant::EMPTY_BASE64;
        }
        if(!AppUtility::isValidBase64($imageBase64)){
            $error = ApiConstant::INVALID_BASE64;
        }
        return $error;
    }

    public static function formatPhoneNumber($phoneNumber) {
       $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);

        if(strlen($phoneNumber) > 10) {
            $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
            $areaCode = substr($phoneNumber, -10, 3);
            $nextThree = substr($phoneNumber, -7, 3);
            $lastFour = substr($phoneNumber, -4, 4);

            $phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
        }
        else if(strlen($phoneNumber) == 10) {
            $areaCode = substr($phoneNumber, 0, 3);
            $nextThree = substr($phoneNumber, 3, 3);
            $lastFour = substr($phoneNumber, 6, 4);

            $phoneNumber = '('.$areaCode.') '.$nextThree.'-'.$lastFour;
        }
        else if(strlen($phoneNumber) == 7) {
            $nextThree = substr($phoneNumber, 0, 3);
            $lastFour = substr($phoneNumber, 3, 4);

            $phoneNumber = $nextThree.'-'.$lastFour;
        }

        return $phoneNumber;
    }
    public static function getCoordinates($address){
        $address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
       try{$response = file_get_contents($url);
           if(!empty($response)){
               $json = json_decode($response,TRUE); //generate array object from the response from the web
//        print_r($json['results'][0]['geometry']['location']);
               return ($json['results'][0]['geometry']['location']);
           }
       }
       catch(\Exception $e){
           return ApiConstant::UNABLE_TO_RETRIEVE_ADDRESS;
       }
    }

    public static function getDistance($data){
        $url = 'http://maps.googleapis.com/maps/api/distancematrix/json?origins='.$data['zipcode1'].'+se&destinations='.$data['zipcode2'].'&sensor=false';
        try{
            $response = file_get_contents($url);
            if(!empty($response)){
                $json = json_decode($response,TRUE); //generate array object from the response from the web
//        print_r($json['results'][0]['geometry']['location']);
                $distanceInKm = $json['rows'][0]['elements'][0]['distance']['text'];
                $distanceInMiles = .6*$distanceInKm;
                if($distanceInMiles < 0){
                    $distanceInMiles = 0;
                }
                return $distanceInMiles.' miles';
            }
        }
        catch(\Exception $e){
            $distanceInMiles = 0;
            return $distanceInMiles.' miles';

//            return ApiConstant::UNABLE_TO_RETRIEVE_ADDRESS;
        }
    }

    public static function byzipcode($zip){
        $url = 'http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address='.$zip;
       try{
           $response = file_get_contents($url);
           if(!empty($response)){

               $completeAddress['zipcode'] = $zip;
               $json = json_decode($response,TRUE); //generate array object from the response from the web
               if($json['status']=='OK'){
                   foreach($json as $data){
                       if($data[0]['address_components']){

                           $address = $data[0]['address_components'];
                           foreach($address as $break){
                               if($break['types'][0] == "administrative_area_level_1" ){
                                   $completeAddress['state'] = $break['long_name'];
                               }
                               if($break['types'][0] == "locality"){
                                   $completeAddress['city'] = $break['long_name'];
                               }else {
                                   if ($break['types'][0] == "administrative_area_level_2") {
                                       $completeAddress['city'] = $break['long_name'];
                                   }
                               }
                               if($break['types'][0] == "country" ){
                                   $completeAddress['country']  = $break['long_name'];
                               }
                           }
                           return $completeAddress;
                       }
                   }
               }else{
                   return null;
               }


           }
       }
       catch(\Exception $e){
           return ApiConstant::UNABLE_TO_RETRIEVE_ADDRESS;
       }
    }

    public static function unique_multidim_array($array, $key) {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

    public static function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' kB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
    public static function getAllZipCodeByDistance($data){
        $url = 'https://www.zipcodeapi.com/rest/TowlVq0meBP5g9vOpTvsV779wgdvcfm6DSszisVx4KCkT89j1EMXMT6iakOmzatc/radius.json/'.$data['searchByLocation'].'/'.$data['distance'].'/mile';
//        $url = 'https://www.zipcodeapi.com/rest/B8jlJvGH9RPhctdOYZX5d7WZRTlCdF3POmaxSRf2I4kUxxJvxGBKOxJFr5iELltz/radius.json/'.$data['searchByLocation'].'/'.$data['distance'].'/mile';
        $zipcodes = array();
        try{
            $response = file_get_contents($url);
            if(!empty($response)){
                $json = json_decode($response,TRUE); //generate array object from the response from the web
                $allZip = $json['zip_codes'];
                foreach ( $allZip as $item) {
                    $zipcodes[] = $item['zip_code'];
                }
              return $zipcodes;
            }
        }
        catch(\Exception $e){
            $distanceInMiles = 0;
            return $distanceInMiles.' miles';

//            return ApiConstant::UNABLE_TO_RETRIEVE_ADDRESS;
        }
    }
}