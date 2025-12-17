<?php
namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\CustomerModel;
use App\Models\ProjectTypeModel; // lo creamos igual que los demás
use CodeIgniter\RESTful\ResourceController;

class ProjectsController extends ResourceController
{
    protected $modelName = ProjectModel::class;

    public function index()
    {
        $data['projects'] = $this->model->getWithRelations();
        return view('projects/index', $data);
    }

    public function new()
    {
        $data['customers'] = model(CustomerModel::class)->findAll();
        $data['types'] = model(ProjectTypeModel::class)->findAll();
        return view('projects/form', $data);
    }

    public function create()
    {
        if ($this->model->insert($this->request->getPost())) {
            return redirect()->to('/projects')->with('msg', 'Proyecto creado');
        }
        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function edit($id = null)
    {
        $data['project'] = $this->model->find($id);
        $data['customers'] = model(CustomerModel::class)->findAll();
        $data['types'] = model(ProjectTypeModel::class)->findAll();
        return view('projects/form', $data);
    }

    public function update($id = null)
    {
        if ($this->model->update($id, $this->request->getPost())) {
            return redirect()->to('/projects')->with('msg', 'Proyecto actualizado');
        }
        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return redirect()->to('/projects')->with('msg', 'Proyecto eliminado');
    }
}