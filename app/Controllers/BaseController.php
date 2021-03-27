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

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\CarModel;
use App\Models\DrivingDayModel;
use App\Models\StationModel;
use App\Models\FuelModel;

date_default_timezone_set('Asia/Kolkata');

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['cookie'];
	/**
	 * An model veriable which will be accessed in controller
	 */


	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = \Config\Services::session();
		$this->db= \Config\Database::connect();
		$this->usermodel= new UserModel();
		$this->carmodel= new CarModel();
		$this->drivingmodel= new DrivingDayModel();
		$this->stationmodel= new StationModel();
		$this->fuelmodel= new FuelModel();
		$this->validation = \Config\Services::validation();

		date_default_timezone_set('Asia/Kolkata');
	}

}
