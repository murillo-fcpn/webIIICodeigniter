<?php
namespace App\Models;
use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'location', 'customer_id', 'project_type_id'];
    protected $useSoftDeletes = false;
    protected $validationRules = [
        'name' => 'required|max_length[100]',
        'customer_id' => 'required|is_natural_no_zero',
        'project_type_id' => 'required|is_natural_no_zero'
    ];

    // Traer cliente y tipo
    public function getWithRelations()
    {
        return $this->select('projects.*, customers.name AS customer_name, project_type.name AS type_name')
            ->join('customers', 'customers.id = projects.customer_id')
            ->join('project_type', 'project_type.id = projects.project_type_id')
            ->findAll();
    }
}