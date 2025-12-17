<?php
namespace App\Models;
use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['project_id', 'name', 'start_date', 'end_date', 'status_task_id'];
    protected $validationRules = [
        'project_id' => 'required|is_natural_no_zero',
        'name' => 'required|max_length[100]',
        'start_date' => 'required|valid_date',
        'end_date' => 'permit_empty|valid_date',
        'status_task_id' => 'required|is_natural_no_zero'
    ];

    // Listado con proyecto, cliente y estado
    public function getFull()
    {
        return $this->select('tasks.*,
                              projects.name AS project_name,
                              customers.name AS customer_name,
                              status_tasks.name AS status_name')
            ->join('projects', 'projects.id = tasks.project_id')
            ->join('customers', 'customers.id = projects.customer_id')
            ->join('status_tasks', 'status_tasks.id = tasks.status_task_id')
            ->findAll();
    }
}