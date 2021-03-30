<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

class Api extends BaseController
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;
    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        //parent::__construct();
    }

    public function index()
    {
        $response['status'] = "success";
        $response['message'] = "Api working fine!";
        $this->sendResponse($response);
    }


    /**
     * Get destincations
     * @endpoint: get-destincations
     * @url : http://test-bh.potenzaglobalsolutions.com/lucabrasi/api/get-destincations
     */
    public function get_destinations()
    {
        $response = array("status" => "error");
        $data = $this->db->table('destinations')->select('destination_id,name')->get()->getResultArray();
        if ($data) {
            $response['status'] = "success";
            $response['message'] = "stations fetched successfully.";
            $response['data'] = $data;
            $this->sendResponse($response);
        } else {
            $response['message'] = "No stations found.";
        }
        $this->sendResponse($response);
    }

    /**
     * Driver login
     * @endpoint: driver-login
     * @url : http://test-bh.potenzaglobalsolutions.com/lucabrasi/api/driver-login
     * @param
     * username : ##
     * password : ##
     * @response
     * driver_id
     */
    public function driver_login()
    {
        $response = array("status" => "error");
        if (!$this->api_auth()) {
            $response['message'] = 'Authentication Failed.';
            $this->sendResponse($response);
        }
        $required_fields = array("username", "password");
        $status = $this->verifyRequiredParams($required_fields);

        if ($status) {
            $username     = trim($this->request->getVar("username"));
            $password     = trim($this->request->getVar("password"));

            if (isset($username) && empty($username)) {
                $response['message'] = "Please enter username";
                $this->sendResponse($response);
            }

            if (isset($password) && empty($password)) {
                $response['message'] = "Please enter password";
                $this->sendResponse($response);
            }

            $condition = array(
                'username' => $username,
                'password' => md5($password),
            );

            $data = $this->db->table('tbl_user')->select('user_id')->where($condition)->get()->getRowArray();

            if (!empty($data)) {
                $response['status'] = 'success';
                $response['message'] = 'Successfully Logged in.';
                $response['data'] = $data['user_id'];
            } else {
                $response['message'] = 'Invalid email or password.';
            }
        } else {
            $response['message'] = 'One or More fields are required.';
        }
        $this->sendResponse($response);
    }

    /**
     * Start driver day
     * @endpoint : start-day
     * @url : http://test-bh.potenzaglobalsolutions.com/lucabrasi/api/start-day
     * @param
     * station_id : ##
     * driver_id : ##
     * start_kilometer : ##
     * car_id : ##
     * start_fuel_level : ##
     * @response 
     * day_id
     */
    public function start_day()
    {
        $response = array("status" => "error");
        if (!$this->api_auth()) {
            $response['message'] = 'Authentication Failed.';
            $this->sendResponse($response);
        }
        $required_fields = array("station_id", "driver_id", "start_kilometer", "car_id", "start_fuel_level");
        $status = $this->verifyRequiredParams($required_fields);

        if ($status) {
            $station_id         =   trim($this->request->getVar('station_id'));
            $driver_id          =   trim($this->request->getVar('driver_id'));
            $start_kilometer    =   trim($this->request->getVar('start_kilometer'));
            $car_id              =   trim($this->request->getVar('car_id'));
            $start_fuel_level   =   trim($this->request->getVar('start_fuel_level'));

            if (isset($station_id) && empty($station_id)) {
                $response['message'] = "Please enter station id";
                $this->sendResponse($response);
            }

            if (isset($driver_id) && empty($driver_id)) {
                $response['message'] = "Please enter driver id";
                $this->sendResponse($response);
            }

            if (isset($start_kilometer) && empty($start_kilometer)) {
                $response['message'] = "Please enter start kilometer";
                $this->sendResponse($response);
            }

            if (isset($car_id) && empty($car_id)) {
                $response['message'] = "Please enter car_id";
                $this->sendResponse($response);
            }

            if (isset($start_fuel_level) && empty($start_fuel_level)) {
                $response['message'] = "Please enter start fuel level";
                $this->sendResponse($response);
            }
            $timestamp = date('Y-m-d H:i:s');
            $data = array(
                'user_id'           => $driver_id,
                'destination_id'   => $station_id,
                'start_kilometer'   => $start_kilometer,
                'car_id'              => $car_id,
                'start_fuel_level'  => $start_fuel_level,
                'start_timestamp'   => $timestamp,
                'day_step_status'   => 1

            );
            try {
                $result = $this->db->table('driving_day')->insert($data);
                $day_id = $this->db->insertID();
                $response_data = array(
                    'day_id' => $day_id,
                    // 'car_id' => $car_id 
            );
            } catch (\Exception $e) {

                $response['message'] = "Something went wrong!";
                $this->sendResponse($response);
            }
            if ($result) {
                $response['status'] = "success";
                $response['message'] = "Day started successfully";
                $response['data'] = $response_data;
            } else {
                $response['message'] = "Something went wrong";
            }
        } else {
            $response['message'] = "One or more fields required";
        }
        $this->sendResponse($response);
    }

    /**
     * Get day timestamp
     * @endpoint: start-day
     * @url : http://test-bh.potenzaglobalsolutions.com/lucabrasi/api/get-day-start-timestamp
     * @param
     * driver_id : ##
     * day_id : ##
     */
    public function get_day_timestamp()
    {
        $response = array("status" => "error");
        if (!$this->api_auth()) {
            $response['message'] = 'Authentication Failed.';
            $this->sendResponse($response);
        }
        $required_fields = array("driver_id");
        $status = $this->verifyRequiredParams($required_fields);

        if ($status) {
            // $day_id             =   trim($this->request->getVar('day_id'));
            $driver_id          =   trim($this->request->getVar('driver_id'));

            // if (isset($day_id) && empty($day_id)) {
            // 	$response['message'] = "Please enter day id";
            // 	$this->sendResponse($response);
            // }

            if (isset($driver_id) && empty($driver_id)) {
                $response['message'] = "Please enter driver id";
                $this->sendResponse($response);
            }
            $today = date('Y-m-d');
            $condition = array(
                // 'day_id'    => $day_id,
                'start_timestamp >='    => $today,
                'user_id'   => $driver_id
            );

            $data = $this->db->table('driving_day')->select('start_timestamp')->where($condition)->get()->getRowArray();
            $result = array('timestamp' => $data['start_timestamp']);
            if ($data) {
                $response['status']     = 'success';
                $response['message']    = 'Timestamp fetched successfully';
                $response['data']       = $result;
            } else {
                $response['message'] = 'No data found';
            }
        } else {
            $response['message']    = 'One or more fields required';
        }
        $this->sendResponse($response);
    }

    /**
     * get step status
     * @endpoint: get-step-status
     * @url : http://test-bh.potenzaglobalsolutions.com/lucabrasi/api/get-step-status
     * @param
     * driver_id : ##
     */
    public function get_step_status()
    {
        $response = array("status" => "error");
        
        $required_fields = array("driver_id");
        $status = $this->verifyRequiredParams($required_fields);
        if($status)
        {
            $driver_id          =   trim($this->request->getVar('driver_id'));

            if (isset($day_id) && empty($day_id)) {
				$response['message'] = "Please enter day id";
				$this->sendResponse($response);
			}

            if (isset($driver_id) && empty($driver_id)) {
				$response['message'] = "Please enter driver id";
				$this->sendResponse($response);
			}
            // $today=date("Y-m-d");
            $cur_date=$this->db->query('Select CURDATE() as cur_date')->getRowArray();
            $condition=array(
                'start_timestamp >=' =>   $cur_date['cur_date'],
                'user_id'   => $driver_id
            );

            $data=$this->db->table('driving_day')->select('day_step_status,car_id')->where($condition)->get()->getRowArray();

            //  echo $this->db->getLastQuery();die;
            if($data)
            {
                $response['status']="success";
                $response['message']="day step status fetched successfully.";
                $response['data']=$data;
                $this->sendResponse($response);
            }
            else
            {
                $data=array('day_step_status'=>0,'car_id'=>0);
                $response['status']="success";
                $response['message']="day step status fetched successfully.";
                $response['data']=$data;
            }
        }
        else
        {
            $response['message']="One or more fields required.";
        }
        $this->sendResponse($response);
    }

    /**
     * stop timer
     * @endpoint: stop-timer
     * @url : http://test-bh.potenzaglobalsolutions.com/luca-brasi/api/stop-timer
     * @param
     * driver_id : ##
     */
    public function stop_timer()
    {
        $response = array("status" => "error");
        $required_fields = array("driver_id");
        $status = $this->verifyRequiredParams($required_fields);
        if ($status) {
            // $day_id             =   trim($this->request->getVar('day_id'));
            $driver_id          =   trim($this->request->getVar('driver_id'));

            // if (isset($day_id) && empty($day_id)) {
            // 	$response['message'] = "Please enter day id";
            // 	$this->sendResponse($response);
            // }

            if (isset($driver_id) && empty($driver_id)) {
                $response['message'] = "Please enter driver id";
                $this->sendResponse($response);
            }

            $timestamp = date('Y-m-d H:i:s');

            $today = date('Y-m-d');
            $condition = array(
                'start_timestamp >='    => $today,
                'user_id'   => $driver_id,

            );

            $data = array(
                'end_timestamp'     =>  $timestamp,
                'day_step_status'   =>  2
            );


            $res = $this->db->table('driving_day')->set($data)->where($condition)->update();
            $rows_affected = $this->db->affectedRows();
            echo $rows_affected;
            // echo $th$rows_affectedis->db->getLastQuery();
            if ($rows_affected != 0) {
                $response['status'] = "success";
                $response['message'] = "Timer stopped successfully";
                $this->sendResponse($response);
            } else {
                $response['message'] = "Something went wrong";
            }
        } else {
            $response['message'] = "One or more fields required";
        }
        $this->sendResponse($response);
    }

    /**
     * finish day
     * @endpoint: finish-day
     * @url : http://test-bh.potenzaglobalsolutions.com/luca-brasi/api/finish-day
     * @param
     * driver_id : ##
     * day_id : ##
     * accident_status : ##
     * end_kilometer : ##
     * end_fuel_level : ##
     */
    public function finish_day()
    {
        $response = array("status" => "error");
        $required_fields = array("driver_id", "accident_status", "end_kilometer", "end_fuel_level");
        $status = $this->verifyRequiredParams($required_fields);
        if ($status) {
            // $day_id             =   trim($this->request->getVar('day_id'));
            $driver_id          =   trim($this->request->getVar('driver_id'));
            $accident_status    =   trim($this->request->getVar('accident_status'));
            $end_kilometer      =   trim($this->request->getVar('end_kilometer'));
            $end_fuel_level     =   trim($this->request->getVar('end_fuel_level'));

            // if (isset($day_id) && empty($day_id)) {
            // 	$response['message'] = "Please enter day id";
            // 	$this->sendResponse($response);
            // }

            if (isset($driver_id) && empty($driver_id)) {
                $response['message'] = "Please enter driver id";
                $this->sendResponse($response);
            }

            if (isset($accident_status) && $accident_status == null) {
                $response['message'] = "Please enter accident status";
                $this->sendResponse($response);
            }

            if (isset($end_kilometer) && empty($end_kilometer)) {
                $response['message'] = "Please enter end kilometer";
                $this->sendResponse($response);
            }

            if (isset($end_fuel_level) && empty($end_fuel_level)) {
                $response['message'] = "Please enter end fuel level";
                $this->sendResponse($response);
            }

            $data = array(
                'accident_status'   => $accident_status,
                'end_kilometer'     => $end_kilometer,
                'end_fuel_level'    => $end_fuel_level,
                'day_step_status'   => 3,

            );
            $today = date('Y-m-d');
            $condition = array(
                'start_timestamp >=' => $today,
                'user_id' => $driver_id,
            );

            $data = $this->db->table('driving_day')->set($data)->where($condition)->update();
            $rows_affected = $this->db->affectedRows();
            echo $rows_affected;
            die;
            if ($rows_affected != 0) {
                $response['status'] = "success";
                $response['message'] = "day ended successfully";
                $this->sendResponse($response);
            } else {
                $response['message'] = "Something went wrong";
            }
        } else {
            $response['message'] = "One or more fields required";
        }
        $this->sendResponse($response);
    }

    /**
     * Send message to administrator
     * @endpoint: send-message
     * @url : http://test-bh.potenzaglobalsolutions.com/lucabrasi/api/send-message
     * @param
     * day_id : ##
     * message : ##
     * driver_id : ##
     */
    public function send_message()
    {
        $response = array("status" => "error");
        $required_fields = array("day_id", "driver_id", "message");
        $status = $this->verifyRequiredParams($required_fields);
        if ($status) {
            $day_id             =   trim($this->request->getVar('day_id'));
            $message            =   trim($this->request->getVar('message'));
            $driver_id          =   trim($this->request->getVar('driver_id'));

            if (isset($day_id) && empty($day_id)) {
                $response['message'] = "Please enter end day id";
                $this->sendResponse($response);
            }

            if (isset($message) && empty($message)) {
                $response['message'] = "Please enter end message";
                $this->sendResponse($response);
            }


            if (isset($driver_id) && empty($driver_id)) {
                $response['message'] = "Please enter end driver id";
                $this->sendResponse($response);
            }

            $data = array(
                'message'   =>   $message,
                'day_id'    =>   $day_id,
                'user_id'   =>   $driver_id
            );

            $res = $this->db->table('message')->insert($data);

            if ($res) {
                $response['status'] = "success";
                $response['message'] = "message sent successfully.";
                $this->sendResponse($response);
            } else {
                $response['message'] = "Something went wrong.";
            }
        } else {
            $response['message'] = "One or more fields required.";
        }
        $this->sendResponse($response);
    }

    /**
     * add fuel 
     * @endpoint: add-fuel
     * @url : http://test-bh.potenzaglobalsolutions.com/lucabrasi/api/add-fuel
     * @param
     * day_id : ##
     * driver_id : ##
     * kilometer : ##
     * zipcode : ##
     * fuel_amount : ##
     * amount: ##
     * oil_status : ##
     * tanked_status : ##
     */
    public function add_fuel()
    {
        $response = array("status" => "error");
        $required_fields = array("day_id", "driver_id", "kilometer", "zipcode", "kilometer", "fuel_amount", "amount", "oil_status", "tanked_status");
        $status = $this->verifyRequiredParams($required_fields);
        if ($status) {

            $day_id             =   trim($this->request->getVar('day_id'));
            $driver_id          =   trim($this->request->getVar('driver_id'));
            $kilometer          =   trim($this->request->getVar('kilometer'));
            $zipcode            =   trim($this->request->getVar('zipcode'));
            $fuel_amount        =   trim($this->request->getVar('fuel_amount'));
            $amount             =   trim($this->request->getVar('amount'));
            $oil_status         =   trim($this->request->getVar('oil_status'));
            $tanked_status      =   trim($this->request->getVar('tanked_status'));

            if (isset($day_id) && empty($day_id)) {
                $response['message'] = "Please enter end day id";
                $this->sendResponse($response);
            }

            if (isset($driver_id) && empty($driver_id)) {
                $response['message'] = "Please enter end driver id";
                $this->sendResponse($response);
            }

            if (isset($kilometer) && empty($kilometer)) {
                $response['message'] = "Please enter end kilometer";
                $this->sendResponse($response);
            }


            if (isset($fuel_amount) && empty($fuel_amount)) {
                $response['message'] = "Please enter end fuel amount";
                $this->sendResponse($response);
            }


            if (isset($amount) && empty($amount)) {
                $response['message'] = "Please enter end amount";
                $this->sendResponse($response);
            }


            if (isset($oil_status) && $oil_status == "") {
                $response['message'] = "Please enter end oil status";
                $this->sendResponse($response);
            }


            if (isset($tanked_status) && $tanked_status == "") {
                $response['message'] = "Please enter end tanked status";
                $this->sendResponse($response);
            }


            if (isset($zipcode) && empty($zipcode)) {
                $response['message'] = "Please enter end zipcode";
                $this->sendResponse($response);
            }

            $data = array(
                'user_id'               =>   $driver_id,
                'day_id'                =>   $day_id,
                'kilometer'             =>   $kilometer,
                'zipcode'               =>   $zipcode,
                'fuel_amount'           =>   $fuel_amount,
                'amount'                =>   $amount,
                'oil_status'            =>   $oil_status,
                'blue_tanked_status'    =>   $tanked_status,
            );

            $res = $this->db->table('fuel')->insert($data);

            if ($res) {
                $response['status'] = "success";
                $response['message'] = "fuel information added successfully.";
                $this->sendResponse($response);
            } else {
                $response['message'] = "Something went wrong.";
            }
        } else {
            $response['message'] = "One or more fields required.";
        }
        $this->sendResponse($response);
    }


    /**
     * Get cars
     * @endpoint: get-cars
     * @url : http://test-bh.potenzaglobalsolutions.com/lucabrasi/api/get-cars
     */
    public function get_cars()
    {
        $response = array("status" => "error");
        $data = $this->db->table('tbl_car')->select('car_id,car_noplate')->get()->getResultArray();
        if ($data) {
            $response['status'] = "success";
            $response['message'] = "stations fetched successfully.";
            $response['data'] = $data;
            $this->sendResponse($response);
        } else {
            $response['message'] = "No stations found.";
        }
        $this->sendResponse($response);
    }

    //-----------------------------------------------------------------------------------------------------------

    /**
     * Verify parameters
     */
    public function verifyRequiredParams($fields)
    {
        $error = false;
        $error_fields = "";
        $request_params = array();
        $request_params = $_REQUEST;
        foreach ($fields as $field) {
            if (!isset($request_params[$field])) {
                $error = true;
                $error_fields .= $field . ', ';
            }
        }
        if ($error) {
            // Required field(s) are missing or empty
            // echo error json and stop the app
            $response = array();
            $response["error"] = true;
            $response["message"] = 'One or more fileds are required. ' . substr($error_fields, 0, -2);
            return false;
        } else {
            return true;
        }
    }

    /**
     * JSON Response
     */
    public function sendResponse($response)
    {
        header('Content-Type: application/json');
        echo json_encode($response);
        die;
    }

    /**
     * API authentication
     */
    public function api_auth()
    {

        if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
            $condition = array(
                'username' =>   $_SERVER['PHP_AUTH_USER'],
                'password' =>   $_SERVER['PHP_AUTH_PW'],
            );

            $data = $this->db->table('api_auth')->where($condition)->get()->getResultArray();
            if (!empty($data)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * get step status
     * @endpoint: get-status
     * @url : http://test-bh.potenzaglobalsolutions.com/lucabrasi/api/get-status
     * @param
     * driver_id : ##
     * date : YYYY-mm-dd
     */
    public function get_status()
    {
        $response = array("status" => "error");

        $required_fields = array("driver_id", "date");
        $status = $this->verifyRequiredParams($required_fields);
        if ($status) {
            $driver_id             =   trim($this->request->getVar('driver_id'));
            $date          =   trim($this->request->getVar('date'));

            if (isset($driver_id) && empty($driver_id)) {
                $response['message'] = "Please enter day id";
                $this->sendResponse($response);
            }

            if (isset($date) && empty($date)) {
                $response['message'] = "Please enter date";
                $this->sendResponse($response);
            }
            $today = date("Y-m-d");
            $condition = array(
                'user_id'    => $driver_id,
                'start_timestamp >='   => $today
            );
            // print_r($condition);die;

            $data = $this->db->table('driving_day')->select('car_id')->where($condition)->get()->getRowArray();
            // echo $this->db->getLastQuery();die;
            if ($data) {
                $response['status'] = "success";
                $response['message'] = "car id fetched successfully.";
                $response['data'] = $data;
                $this->sendResponse($response);
            } else {
                $response['message'] = "Day not started yet.";
            }
        } else {
            $response['message'] = "One or more fields required.";
        }
        $this->sendResponse($response);
    }
    //-------------------------------------------------------------------------------------------------------------
}
