<?php
namespace App\Controllers;

use App\Models\Employee;

class EmployeeController extends BaseController 
{
    public function index(){
        $employee = new Employee();
        $data['employee'] = $employee->findAll();
        return view('employee/index',$data);
    }

    public function create(){
        return view ('employee/create');
    }

    public function store(){
        $employee = new Employee();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'designation' => $this->request->getPost('designation'),
        ];
        $employee->save($data);
        return redirect()->to(base_url('/'))->with('status','Employee Added Successfully!');
    }

    public function edit($id){
        $employee = new Employee();
        $data['employee'] = $employee->find($id);
        return view('employee/edit',$data);
    }

    public function update($id){
        $employee = new Employee();
        $employee->find($id);
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'designation' => $this->request->getPost('designation'),
        ];
        $employee->update($id,$data);
        return redirect()->to(base_url('/'))->with('status','Employee Data Updated Successfully!');
    }

    public function delete($id){
        $employee = new Employee();
        $employee->delete($id);
        return redirect()->to(base_url('/'))->with('delete','Employee Data Deleted Successfully!');
    }
}


?>