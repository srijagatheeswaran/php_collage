<?php

namespace App\Controllers;

class Student extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->datatable = $this->db->table('admin'); 
        $this->StudentTable = $this->db->table('student');   

    }
    public function index()
    {
        echo view('template/header');
        echo view('studentpage');
        echo view('template/footer');
    }
    public function add()
    {
        echo view('addstu');
    }
    public function showDropDown()
    {
        $data = $this->datatable->get()->getResult();
        $option = "";
        foreach ($data as $row) {
            $option .= '<option value=" ' . $row->dept . '">' . $row->dept . '</option>';

        }
        echo json_encode($option);
    }
    public function addStudentData()
    {
        $data = $this->request->getvar();
        $data['status']='Pending';
        $result = $this->StudentTable->insert($data);
        if ($result) {
            return json_encode(1);
        }
        else{
            return json_encode(0);
        }
    }
    public function getStudentData(){
        $data = $this->StudentTable->get()->getResult();
        $tr = "";
        $i = 1;
        foreach ($data as $row) {
            $tr .= '<tr>
            <td id="hai">' . $i . '</td>
            <td>' . $row->name . '</td>
            <td>' . $row->mobile_number . '</td>
            <td>' . $row->email . '</td>
            <td>' . $row->gender . '</td>
            <td>' . $row->dept . '</td>
            <td>' . $row->status . '</td>
            </tr>';
            $i++;

        }
        echo json_encode($tr);
    }

}