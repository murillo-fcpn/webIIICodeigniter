<?php
namespace App\Models;

use CodeIgniter\Model;

class StatusTaskModel extends Model
{
    protected $table = 'status_tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    protected $validationRules = [
        'name' => 'required|max_length[50]|is_unique[status_tasks.name,id,{id}]'
    ];
}