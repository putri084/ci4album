<?php
namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model {
    
	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['fullname', 'username', 'password', 'avatar', 'email', 'address', 'role', 'reset_at', 'reset_token'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}