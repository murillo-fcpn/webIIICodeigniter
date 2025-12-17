<?php
namespace App\Models;
use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = ''; // no usamos updated_at
    protected $validationRules = [
        'name' => 'required|max_length[100]',
        'email' => 'required|valid_email|is_unique[customers.email,id,{id}]'
    ];
}