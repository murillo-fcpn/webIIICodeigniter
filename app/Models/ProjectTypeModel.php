<?php
namespace App\Models;

use CodeIgniter\Model;

class ProjectTypeModel extends Model
{
    protected $table = 'project_type';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    protected $validationRules = [
        'name' => 'required|max_length[50]|is_unique[project_type.name,id,{id}]'
    ];
}