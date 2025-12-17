<?php
namespace App\Controllers;
use App\Models\CustomerModel;
use CodeIgniter\RESTful\ResourceController;

class CustomersController extends ResourceController
{
    protected $modelName = CustomerModel::class;

    public function index()
    {
        $data['customers'] = $this->model->findAll();
        return view('customers/index', $data);
    }

    public function new()
    {
        return view('customers/form');
    }

    public function create()
    {
        if ($this->model->insert($this->request->getPost())) {
            return redirect()->to('/customers')->with('msg', 'Cliente creado');
        }
        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function edit($id = null)
    {
        $data['customer'] = $this->model->find($id);
        return view('customers/form', $data);
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $data['id'] = $id;

        if ($this->model->save($data)) {
            return redirect()->to('/customers')->with('msg', 'Cliente actualizado');
        }
        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return redirect()->to('/customers')->with('msg', 'Cliente eliminado');
    }
}