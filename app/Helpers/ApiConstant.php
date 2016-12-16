<?php
namespace App\Helpers;

class ApiConstant
{

    const AUTHENTICATION_FAILED = '-101';
    const PARAMETER_MISSING = '-102';
    const EXCEPTION_OCCURED = '-103';
    const TOKEN_EXPIRED = '-104';
    const ERROR_CODE_NOT_EXIST = '-105';
    const INVALID_REQUEST_TYPE = '-106';
    const DATA_NOT_SAVED = '-107';
    const DATA_NOT_FOUND = '-108';
    const STATE_NOT_FOUND = '-172';
    const EMPTY_FIRST_NAME = '-109';
    const EMPTY_LAST_NAME = '-110';
    const EMPTY_PASSWORD = '-111';
    const EMPTY_EMAIL = '-112';
    const EMPTY_STATE = '-113';
    const EMPTY_DISTRICT = '-114';
    const EMAIL_NOT_VALID = '-115';
    const FIRST_NAME_LENGTH_EXCEEDED = '-116';
    const LAST_NAME_LENGTH_EXCEEDED = '-117';
    const PASSWORD_LENGTH_EXCEEDED = '-118';
    const EMAIL_LENGTH_EXCEEDED = '-119';
    const EMPTY_BIRTHDATE = '-120';
    const WRONG_DATE_FORMAT = '-121';
    const INVALID_DATE = '-122';
    const EMAIL_ALREADY_EXIST = '-123';
    const INVALID_USERNAME_PASSWORD = '-124';
    const ID_PARAM_NOT_NUMERIC = '-125';
    const EMAIL_NOT_REGISTERED = '-126';
    const EMPTY_TOKEN = '-127';
    const INVALID_RESET_TOKEN = '-128';
    const RESET_TOKEN_EXPIRED = '-129';
    const RECORD_NOT_EXIST = '-130';
    const USER_HAS_NO_PRIVILEGES = '-131';
    const ROLE_NOT_ASSIGNED = '-132';
    const INVALID_BASE64 = '-133';
    const EMPTY_BASE64 = '-134';
    const EMPTY_POST_TYPE_ID= '-135';
    const EMPTY_STATUS_ID='-136';
    const EMPTY_DEVICE_TOKEN='-137';
    const EMPTY_DEVICE_UDID='-138';
    const EMPTY_LOCATION_DATA='-139';
    const EMPTY_COMPETITION_TITLE='-140';
    const EMPTY_DEVICE_DATA='-141';
    const EMPTY_COMPETITION_EVENT_TYPE='-142';
    const EMPTY_FROM_DATE='-143';
    const EMPTY_TO_DATE='-144';
    const EMPTY_LOCATION='-145';
    const EMPTY_DESCRIPTION='-146';
    const EMPTY_FITNESS_DEVICE_ID='-147';
    const INVALID_USERNAME = '-148';
    const INVALID_DATA= '-149';
    const COMPANY_ALREADY_EXIST= '-150';
    const COMPANY_ALREADY_EXIST_WITH_SAME_LOCATION= '-156';
    const COMPANY_PROFILE_UPDATED = '-152';
    const COMPANY_LOCATION_ALREADY_EXISTS= '-155';
    const UNABLE_TO_RETRIEVE_ADDRESS= '-158';
    const ZIPCODE_NOT_IN_STATE= '-159';
    const ZIPCODE_ERROR= '-160';
    const UNABLE_TO_RETRIEVE_COMPANY_NAME = '-173';
    const UNABLE_TO_RETRIEVE_COMPANY_ADDRESS = '-174';
    const FILE_NOT_FOUND = '-175';
    const COMPANY_PROFILE_ALREADY_EXIST = '176';
    const COMPANY_DOESNOT_EXIST = '178';
    const SELECT_USERTYPE = '250';
    const MAIL_SENDING_IN_PROGRESS = '-252';
    const ONLY_FOR_GENERAL_CONTRACTOR = '-254';
    const FAILED_TO_DELETE = '-255';
    const ERROR_EMAIL_UPDATE = '-256';
    const PASSWORD_WRONG = '-257';
    const ONLY_FOR_ADMIN='-258';
    const INVALID_PHONE_NUMBER_TYPE = '-259';
    const FAILED_TO_UPDATE_COMPANYID = '-260';












    const DATE_FORMAT = 'Y-m-d H:i:s';
    const DATE_ONLY_FORMAT = 'Y-m-d';
    const DATE_FORMAT_GRAMMAR = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (0[0-9]|1[0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/";
    const RESET_TOKEN_EXPIRY = 1440; //only minute value
    const UPLOAD_FILE_NAME = 'uploads';
    const NO_IMAGE_NAME = 'no_image.png';
    const DEFAULT_PAGE_NO = 1;
    const DEFAULT_LIMIT = 15;


    const HTTP_RESPONSE_CODE_SUCCESS = 200;
    const DEFAULT_ERROR_RESPONSE_CODE = 400;
    const HTTP_RESPONSE_CODE_FAILED_AUTHENTICATION = 401;
    const FIRST_NAME_LENGTH = 64;
    const LAST_NAME_LENGTH = 64;
    const PASSWORD_LENGTH = 128;
    const EMAIL_LENGTH = 128;
    const SUCCESS_CODE = 0;
    const ERROR_STATUS = -1;
    const NO_EMAIL_FOUND_FOR_SENDING_MAIL = '-251';
    const INVITATION_EMAIL_ALL_SENT = 'Invitation email already sent';


    const TEAM_MEMBER_DELETED_SUCCESSFULLY = 'Team member deleted successfully';
    const EVENT_CREATED_SUCCESSFULLY = 'Event created successfully';
    const PROJECT_SAVED_SUCCESSFULLY = 'Project created successfully';
    const PROJECT_UPDATED_SUCCESSFULLY = 'Project updated successfully';
    const COMPANY_CREATED_SUCCESSFULLY = 'Company data saved, Successfully.';
    const COMPETTION_CREATED_SUCCESSFULLY = 'Competition created successfully';
    const LOGGED_IN_SUCCESSFULLY = 'Logged in successfully.';
    const FILES_UPLOADED = 'Files uploaded successfully.';
    const FILES_DATA_SAVED = 'Files Data Saved Successfully';
    const FILES_DATA_NOT_SAVED = 'Something Went Wrong';
    const DATA_FOUND ='Record found.';
    const FILE_DELETED ='File deleted successfully.';
    const UPLOAD_FAILED = 'Files uploaded Failed!';
    const NO_FILE_UPLOADED= 'No files for upload.';
    const LOGGED_OUT_SUCCESSFULLY = 'Logged out successfully.';
    const EMAIL_SENT_FOR_CHANGE_PASSWORD = 'Please check your mailbox.';
    const USER_CREATED_SUCCESSFULLY = 'User created successfully.';
    const PASSWORD_CHANGE_SUCCESSFULLY = 'Password changed successfully.';
    const PASSWORD_SENT = "Password reset token sent to your registered email.";
    const USER_NOT_FOUND = "User not found.";
    const UPDATED_SUCCESSFULLY = 'Information updated successfully.';
    const UPDATION_FAILED = '-253';
    const STATUS_PENDING = 'Your current status is pending for approve.';
    const NOT_AUTHORIZED = 'You are not authorized to change the current status of other user.';
    const PROFILE_UPDATED_SUCCESSFULLY = 'Profile updated successfully.';
    const STATUS_POSTED = 'Status posted successfully.';
    const COMMENTED_SUCCESSFULLY = 'Commented successfully.';
    const COMPANY_LOCATION_SAVED_SUCCESSFULLY = 'Location created successfully.';
    const FORMAT_NOT_SUPPORTED = 'Please upload image with jpeg, jpg, bmp, png, gif format.';
    const LIKED_SUCCESSFULLY = 'Liked successfully.';
    const DISLIKED_SUCCESSFULLY = 'Disliked successfully.';
    const PROFILE_PICTURE_SUCCESSFULLY = 'Profile picture changed successfully.';
    const PROFILE_PICTURE_UNSUCCESSFULL = 'Failed to change profile picture.';
    const COMPANY_LOGO_UNSUCCESSFULL = 'Failed to upload company logo.';
    const REQUEST_SENT = 'Pending';
    const REQUEST_ACCEPTED = 'Accepted';
    const REQUEST_REJECTED = 'Rejected';
    const MARK_AS_UNFREIND = 'Unfriended';
    const JOIN_COMPETITION = 'Competition joined';
    const LEAVE_COMPETITION = 'Competition left';
    const CREATED_COMPETITION = 'Created by me';
    const SUBCONTRACTOR_FILE_UPLOADED_SUCCESSFULLY = 'File uploaded successfully!';
    const EMAIL_SENT = 'Invitation email sent!';
    const EMAIL_SENDING_IN_PROGRESS = 'Invitation email sent!';
    const ALL_EMAIL_SENT = 'Invitation email sent to all email Id!';
    const TEN_EMAIL_SENT = 'Invitation email sent to all 10 email Id!';
    const UNABLE_TO_READ_FILE = 'Unable to read  data from file, file sent to account manager!';
    const EMAIL_ID_SAVED_FOR_INVITATION= 'Successfully extracted the emails.';
    const NO_EMAIL_ID_SAVED_FOR_INVITATION= 'No email found or not able to extract the emails.';
    const INVITATION_ALREADY_SENT= 'Invitation already sent to all emails';
    const SUBCONTRACTOR_FILE_UPLOAD_FAILED = 'File uploaded Failed, Please try again!';
    const FILE_FORMAT_NOT_SUPPORTED = 'File format not supported, please upload doc,docx,pdf,xls,xlsx,csv files only!';

    const COMPETITION_NOT_JOINED = 'No active participants for this competition';
    const SELECT_PRIMARY_DEVICE = 'Make sure to select another primary device first!';
    const ACTIVE_COMPETITION_DEVICE = 'Sorry you can not remove this device, as there is active competition associated with this device. 
    Please leave the competition or remove after the competition gets over';
    const SUBCONTRACTOR_COMPANY_PROFILE_UPDATED = 'Subcontractor company profile updated successfully.';

    //Email config
    const FROM_EMAIL = 'testqd01@gmail.com';
    const FROM_NAME = 'PlanHub';
    const PASSWORD_REQUEST_SUBJECT = 'PlanHub Reset Password request';

    //Key of table to dynamically post data for user activity
    const STATUS_POST_TEXT_KEY = 'STATUS_TEXT';
    const COMMENT_POST_ON_TEXT_STATUS_KEY = 'COMMENT_ON_TEXT_STATUS';
    const LIKE_STATUS_KEY = "STATUS_LIKE";
    const IMAGE_POST_KEY = "POST_IMAGE";
    const PROFILE_IMAGE_KEY = "PROFILE_IMAGE";
    const FRIEND_REQUEST_SENT_KEY = "INVITE_FRIEND";
    const FRIEND_REQUEST_ACCEPTED_KEY = "FRIEND_REQUEST_ACCEPTED";
    const FRIEND_REQUEST_REJECTED_KEY = "FRIEND_REQUEST_REJECTED";
    const MARK_UNFREIND_KEY = 'MARK_UNFRIEND';
    const EVENT_IMAGE_KEY = 'EVENT_IMAGE';
    const COMPETITION_IMAGE_KEY = 'COMPETITION_IMAGE';
    const COMPETITION_INVITATION_ACCEPTED = 'COMPETITION_JOINED';
    const COMPETITION_INVITATION_REJECTED = 'COMPETITION_LEFT';
    const HEALTH_DATA_SAVED = 'HEALTH_DATA_SAVED';

    //Activity texts
    const TEXT_STATUS_POSTED = 'updated new status';
    const COMMENT_POST_ON_TEXT_STATUS = 'commented on status';
    const STATUS_LIKE_TEXT = "liked the status";
    const STATUS_DISLIKE_TEXT = "disliked the status";
    const IMAGE_POSTED = "posted an photo";
    const PROFILE_IMAGE = "changed profile picture";
    const EVENT_IMAGE = 'Event picture';
    const COMPETITION_IMAGE = 'Competition picture';
    const FRIEND_REQUEST_SENT = 'Friend request sent.';
    const FRIEND_REQUEST_ACCEPTED = 'Friend request accepted';
    const FRIEND_REQUEST_REJECTED = 'Friend request rejected';
    const MARK_UNFRIEND = 'Marked as unfriend';
    
    //Error messages
    const ERROR_LOGIN = 'Login failed, please try again.';
    const ERROR_REGISTRATION = 'Registration failed, Please try again.';
    Const ERROR_LOGOUT = 'Request timeout, please try again.';
    Const ERROR_FACEBOOK_USER_ID_ACCESS_TOKEN = 'Invalid facebook user id or access token.';
    Const ERROR_FACEBOOK_LOGIN = 'Unable to login with facebook, please try again.';
    Const ERROR_PROFILE_UPDATE = 'Unable to update user profile, please try again.';
    Const ERROR_PASSWORD_UPDATE = 'Unable to update user password, please try again.';
    Const ERROR_COMPETITION_CREATE = 'Unable to create competition, please try again.';
    Const ERROR_IMAGE_UPLOAD = 'Unable to upload image, please try again.';
    Const ERROR_COMPETITION_JOIN = 'Unable to join competition, please try again.';
    Const ERROR_AUTHENTICATION_USER = 'Unable to authenticate the user. Please try again later.';
    Const ERROR_UNABLE_TO_FETCH_DATA = 'Unable to fetch steps and distance data';
    Const ERROR_COMPETITION_LEAVE = 'Unable to leave competition, please try again.';
    Const ERROR_COMPETITION_FOUND = 'No Competition found with the given competition id.';
    Const ERROR_FITNESS_DEVICE_AUTH_TOKEN = 'Could not retrive fitness device auth token, please try again.';
    Const ERROR_STRAVA_AUTH_TOKEN = 'Failed to get strava auth token, please try again.';
    Const ERROR_STRAVA_AUTHENTICATION_CODE = 'Failed to get Strava authentication code, please try again.';
    Const ERROR_STRAVA_STEPS_DISTANCE_DATA = 'Failed to get Strava steps and distance data, please try again.';
    Const ERROR_HEALTH_APP_STEPS_DISTANCE_DATA = 'Failed to get Health App steps and distance data, please try again.';
    Const ERROR_FITBIT_STEPS_DISTANCE_DATA = 'Failed to get Fitbit App steps and distance data, please try again.';
    Const ERROR_FITBIT_AUTH_TOKEN = 'Failed to get Fitbit auth token, please try again.';
    Const ERROR_JAWBONE_AUTH_TOKEN = 'Failed to get Jawbone authentication token, please try again.';
    Const ERROR_REQUEST_PROCESS = 'Unable to process the request, please try again.';
    Const ERROR_FRIEND_REQUEST_SEND = 'Unable to send friend request, please try again.';
    Const ERROR_FRIEND_REQUEST_ACCEPT = 'Failed to accept friend request, please try again.';
    Const ERROR_FRIEND_REQUEST_CANCEL = 'Unable to cancel friend request, please try again.';
    Const ERROR_FRIEND_REQUEST_LIST = 'Failed to get friend request list, please try again.';
    Const ERROR_NOTIFICATION_COUNT = 'Failed to get notification count, please try again.';
    Const ERROR_FRIEND_LIST = 'Unable to refresh friend list, please try again.';
    Const ERROR_PASSWORD_FORGOT = 'Failed to process the forgot password request, please try again.';
    Const ERROR_STATUS_POST = 'Status post failed, please try again.';
    Const ERROR_STATUS_COMMENT = 'Failed to post comment on status, please try again.';
    Const ERROR_PROFILE_IMAGE_UPLOAD = 'Failed upload profile image, please try again.';
    Const LOGO_IMAGE_UPLOADED = 'Logo uploaded successfully.';
    Const LIST_FETCHED_SUCCESSFULLY = 'List fetched Successfully.';
    Const SUBCONTRACTOR_COMPANY_DOESNOT_EXIST = 'Subcontractor company does not exit, Please register company first';
//    Const COMPANY_DOESNOT_EXISTS = 'Company does not exit, Please register company first';
    Const TEAM_MEMBER_UPDATED_SUCCESSFULLY =  'Team member updated sucessfully';
    Const PHONENUMBER_ADDED_SUCCESSFULLY = 'Phone number added successfully';
    Const PHONENUMBER_DELETED_SUCCESSFULLY = 'Phone number deleted successfully';


    public static $english = array(
        ApiConstant::PARAMETER_MISSING => 'Missing parameter in method call.',
        ApiConstant::TOKEN_EXPIRED => 'Sorry, provided auth token code is expired.',
        ApiConstant::AUTHENTICATION_FAILED => 'User Authentication Failed.',
        ApiConstant::ERROR_CODE_NOT_EXIST => 'Provided Error Code Does Not Exist.',
        ApiConstant::INVALID_REQUEST_TYPE => 'Invalid request type.',
        ApiConstant::DATA_NOT_SAVED => 'Something went wrong, please try again.',
        ApiConstant::DATA_NOT_FOUND => 'Record not found.',
        ApiConstant::STATE_NOT_FOUND => 'State not found.',
        ApiConstant::EMPTY_FIRST_NAME => 'Please enter first name.',
        ApiConstant::EMPTY_LAST_NAME => 'Please enter last name.',
        ApiConstant::EMPTY_PASSWORD => 'Please enter password.',
        ApiConstant::EMPTY_EMAIL => 'Please enter email address.',
        ApiConstant::EMPTY_STATE => 'Please enter state.',
        ApiConstant::EMPTY_DISTRICT => 'Please enter district.',
        ApiConstant::EMAIL_NOT_VALID => 'Please enter valid email.',
        ApiConstant::EMPTY_BIRTHDATE => 'Please enter date of birth.',
        ApiConstant::WRONG_DATE_FORMAT => 'Invalid date format.',
        ApiConstant::INVALID_DATE => 'Invalid date, please enter past date.',
        ApiConstant::EMAIL_ALREADY_EXIST => 'This email is already registered.',
        ApiConstant::INVALID_USERNAME_PASSWORD => 'Invalid email id and password combination.',
        ApiConstant::INVALID_USERNAME => 'Email not found.',
        ApiConstant::ID_PARAM_NOT_NUMERIC => 'Id parameter should be +ve numeric.',
        ApiConstant::EMAIL_NOT_REGISTERED => 'This email is not registered.',
        ApiConstant::EMPTY_TOKEN => 'Please enter reset token.',
        ApiConstant::INVALID_RESET_TOKEN => 'Invalid reset token.',
        ApiConstant::RESET_TOKEN_EXPIRED => 'Reset token has expired.',
        ApiConstant::RECORD_NOT_EXIST => 'Record not found.',
        ApiConstant::USER_HAS_NO_PRIVILEGES => 'You have not privileges to perform this action.',
        ApiConstant::ROLE_NOT_ASSIGNED => 'You have not assigned any role.',
        ApiConstant::INVALID_BASE64 => 'Invalid image base64 string.',
        ApiConstant::EMPTY_BASE64 => 'Please add base64 string.',
        ApiConstant::EMPTY_STATUS_ID => 'Please enter status id.',
        ApiConstant::EMPTY_POST_TYPE_ID => 'Please enter post type id.',
        ApiConstant::EMPTY_DEVICE_TOKEN => 'Unable to get device token.',
        ApiConstant::EMPTY_DEVICE_UDID => 'Unable to get device UDID.',
        ApiConstant::EMPTY_LOCATION_DATA => 'Unable to retrive location data.',
        ApiConstant::EMPTY_COMPETITION_TITLE => 'Please enter competition title.',
        ApiConstant::EMPTY_DEVICE_DATA => 'Please select competition device.',
        ApiConstant::EMPTY_COMPETITION_EVENT_TYPE => 'Please select competition event type.',
        ApiConstant::EMPTY_FROM_DATE => 'Please enter from date.',
        ApiConstant::EMPTY_TO_DATE => 'Please enter to date.',
        ApiConstant::EMPTY_LOCATION => 'Please enter location.',
        ApiConstant::EMPTY_DESCRIPTION => 'Please enter description.',
        ApiConstant::EMPTY_FITNESS_DEVICE_ID => 'Invalid fitness device id.',
        ApiConstant::COMPANY_PROFILE_UPDATED => 'Company Profile updated Successfully',
        ApiConstant::SUBCONTRACTOR_COMPANY_DOESNOT_EXIST => 'Subcontractor company does not exit, Please register company first',
        ApiConstant::COMPANY_DOESNOT_EXIST => 'Company does not exit, Please register company first.',
//        ApiConstant::
        ApiConstant::COMPANY_LOCATION_ALREADY_EXISTS => 'Location already exists.',
        ApiConstant::COMPANY_ALREADY_EXIST_WITH_SAME_LOCATION => 'Company already exists.',
        ApiConstant::UNABLE_TO_RETRIEVE_ADDRESS => 'Address not found',
        ApiConstant::ZIPCODE_NOT_IN_STATE => 'Zipcode not present in selected State, please enter correct Zipcode',
        ApiConstant::ZIPCODE_ERROR => 'Invalid Zip code.',
        ApiConstant::UNABLE_TO_RETRIEVE_COMPANY_NAME =>'Unable to get Company name',
        ApiConstant::UNABLE_TO_RETRIEVE_COMPANY_ADDRESS =>'Unable to get Company address',
        ApiConstant::FILE_NOT_FOUND =>'Please upload file.',
        ApiConstant::COMPANY_PROFILE_ALREADY_EXIST =>'Company already exists',
        ApiConstant::SELECT_USERTYPE =>'Please select user type.',
        ApiConstant::NO_EMAIL_FOUND_FOR_SENDING_MAIL =>'No email found!',
        ApiConstant::MAIL_SENDING_IN_PROGRESS =>'Invitation email sending in progress!',
        ApiConstant::UPDATION_FAILED =>'Failed to update, please try again.',
        ApiConstant::ONLY_FOR_GENERAL_CONTRACTOR =>'Only General Contractor can view subcontractors list.',
        ApiConstant::FAILED_TO_DELETE =>'Falied to delete the email please try again.',
        ApiConstant::ERROR_EMAIL_UPDATE =>'Failed to update the email please try again.',
        ApiConstant::PASSWORD_WRONG =>'Current password is wrong, please enter current password',
        ApiConstant::ONLY_FOR_ADMIN => 'Only Admin can perform this action.',
        ApiConstant::INVALID_PHONE_NUMBER_TYPE =>'Invalid phone number type',
        ApiConstant::FAILED_TO_UPDATE_COMPANYID => 'Failed to add team member in company',

    );

    public static $httpErrorCodeMap = array(
        ApiConstant::EXCEPTION_OCCURED => 500,
        ApiConstant::DATA_NOT_FOUND => 204,
        ApiConstant::AUTHENTICATION_FAILED => 401
    );

    //Stripe Test Secret Key
    Const STRIPE_API_TEST_SECRET_KEY = 'sk_test_h1bt0eNLxLkJuAvJbCPDbWeu';
    
    //Facebook App id and App secret
    Const FACEBOOK_TRAINING_AMIGO_APP_ID = '1508726756089682';
    Const FACEBOOK_TRAINING_AMIGO_APP_SECRET_KEY = 'e79101abee1306712273013314b935d2';
    Const FACEBOOK_TRAINING_AMIGO_DEFAULT_GRAPH_VERSION = 'v2.2';
    
    //Twitter App Secret and Key
    Const TWITTER_TRAINING_AMIGO_APP_KEY = '98i1WJ57oITO5HZNOFIzEoA1F';
    Const TWITTER_TRAINING_AMIGO_APP_SECRET = 'EYqHFlk4bVKZKoVLRgbi2kESPucHBMLNU1Hc8RgBUjRHxGIpMj';
    
    //Base path of the upload folder
    //Const BASE_PATH_OF_UPLOAD_FOLDER = '/Applications/XAMPP/htdocs/api/public/uploads/';
    Const BASE_PATH_OF_UPLOAD_FOLDER = '/Applications/XAMPP/htdocs/api/public/uploads/';
}