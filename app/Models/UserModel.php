<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup = 'default';
    protected $table      = 'tbl_user';
    protected $primaryKey = 'user_id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['user_id','first_name','last_name','username','password','driver_license_no','type_id', 'dob', 'license_expiry_date','created_timestamp','modified_timestamp','account_status'];

    protected $useTimestamps = false;
    
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    
    
}
?>