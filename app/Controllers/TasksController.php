<?php
namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\ProjectModel;
use App\Models\StatusTaskModel;
use CodeIgniter\RESTful\ResourceController;


class TasksController extends ResourceController
{
    protected $modelName = TaskModel::class;

    public function index()
    {
        $data['tasks'] = $this->model->getFull(); // método con joins
        return view('tasks/index', $data);
    }

    public function new()
    {
        $data['projects'] = model(ProjectModel::class)->findAll();
        $data['statuses'] = model(StatusTaskModel::class)->findAll();
        return view('tasks/form', $data);
    }

    public function create()
    {
        if ($this->model->insert($this->request->getPost())) {
            return redirect()->to('/tasks')->with('msg', 'Tarea creada');
        }
        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function edit($id = null)
    {
        $data['task'] = $this->model->find($id);
        $data['projects'] = model(ProjectModel::class)->findAll();
        $data['statuses'] = model(StatusTaskModel::class)->findAll();
        return view('tasks/form', $data);
    }

    public function update($id = null)
    {
        if ($this->model->update($id, $this->request->getPost())) {
            return redirect()->to('/tasks')->with('msg', 'Tarea actualizada');
        }
        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return redirect()->to('/tasks')->with('msg', 'Tarea eliminada');
    }
}