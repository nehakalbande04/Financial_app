<?php

namespace App\Models;

use CodeIgniter\Model;


class ClientModel_Dashboard extends Model
{

    public function getStats($data)
    {
        $productId_query = "";
        $AndQueryBuild = " OR product_id =";
        $userType = $data['user_type'];
        $userId = $data['rm_id'];

        $product_ids = explode('#', $data['product_id']);

        foreach ($product_ids as $key => $product_id) {

            if($key == 0){
                $productId_query .= $product_id;
            }else{
                $productId_query .=  $AndQueryBuild.$product_id;
            }

        }
        
        $db = db_connect();

        $query1 = $db->query("SELECT COUNT(*) as total_clients FROM user_master WHERE user_type = $userType");
        $result1 = $query1->getRowArray();

        $query2 = $db->query("SELECT COUNT(*) as total_posts FROM cw_posts WHERE product_id = $productId_query");
        $result2 = $query2->getRowArray();

        $query3 = $db->query("SELECT COUNT(*) as total_chats FROM chat WHERE send_by = $userId");
        $result3 = $query3->getRowArray();

        $data = [
            'total_clients' => $result1['total_clients'],
            'total_posts' => $result2['total_posts'],
            'total_chats' => $result3['total_chats'],
        ];
        return $data;
    }
}
