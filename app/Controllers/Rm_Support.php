<?php

namespace App\Controllers;

use App\Models\Rm_SupportModel;

class Rm_Support extends BaseController
{
    public function index()
    {
        $session = session();

        $data = $session->get('user');

        // print_r($data);exit();

        $SupportModel = new Rm_SupportModel();
        $result['lists'] = $SupportModel->getList($data->id);

        $arr = (array) $result;
    
        // Load the header view
        echo view('rm/header');

        // Load the sidebar view
        echo view('rm/sidebar');

        // Load the dashboard view
        echo view('rm/rm_support', $arr);

        // Load the footer view
        echo view('rm/footer');
    }

    public function Save_Ticket()
    {
        $session = session();

        $data = $session->get('user');
        $params = $this->request->getPost();

        $SupportModel = new Rm_SupportModel();
        $result = $SupportModel->CreateTicket($data->id, $params['message']);

        echo json_encode(array($result));
		exit(0);
    
        
    }

    public function Delete_Ticket()
    {
        $session = session();

        $params = $this->request->getPost();

        $SupportModel = new Rm_SupportModel();
        $result = $SupportModel->DeleteTicket($params['id']);

        echo json_encode(array($result));
		exit(0);
    
        
    }
}