<?php

namespace App\Controllers;

class Admin extends BaseController
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
        echo view('adminpage');
        echo view('template/footer');
    }
    public function add()
    {
        echo view('adddept');
    }
    public function addDebtdata()
    {
        $data = $this->request->getvar();
        $result = $this->datatable->insert($data);
        if ($result) {
            return json_encode(1);
        } else {
            return json_encode(0);

        }
    }
    public function getStudentDataAdmin()
    {
        $data = $this->StudentTable->get()->getResult();
        $tr = "";
        $i = 1;
        foreach ($data as $row) {
            $tr .= '<tr>
            <td id="hai">' . $i . '</td>
            <td>' . $row->name . '</td>
            <td>' . $row->mobile_number . '</td>
            <td>' . $row->email . '</td>
            <td>' . $row->dept . '</td>
            <td>' . $row->status . '</td>
            <td><button class="editpenbtn" type="button"  onclick="status(' . $row->id . ',`Approved`)" ><i class="bi bi-check-square-fill"></i></button>
            <button class="editpenbtn" type="button"  onclick="status(' . $row->id . ',`Declined`)" ><i class="bi bi-x-square-fill"></i></button> </td>     

            </tr>';
            $i++;

        }
        echo json_encode($tr);
    }
    public function upStudentStatus($id, $status)
    {
        if ($status == 'Approved') {
            $editData['status'] = 'Approved';
        }
        else{
            $editData['status'] = 'Declined';
        }
        $vresult = $this->StudentTable->where('id', $id)->update($editData);
        
        echo json_encode($vresult);

    }
}