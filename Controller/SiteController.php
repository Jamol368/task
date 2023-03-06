<?php

namespace App\Controller;

use App\Database\Database;

class SiteController
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function index()
    {
        $products = $this->db->query('SELECT * FROM products WHERE 1')->fetchAll();
        $sku_settings = $this->db->query('SELECT * FROM sku_settings WHERE 1')->fetchAll();
        $this->responce($products, $sku_settings);
    }

    public function skuUpdate($p, $i, $s)
    {
        $sku_settings = $this->db->query("UPDATE sku_settings
        SET prefix = '".$p."', sku_index= '".$i."', suffix= '".$s."'");
        echo json_encode($sku_settings);
    }

    public function productUpdate($id, $name)
    {
        $this->db->query("UPDATE products
        SET name = '".$name."' WHERE id=".$id."" );
        $products['products'] = $this->db->query('SELECT * FROM products WHERE 1')->fetchAll();
        echo json_encode($products);
    }
    public function productDelete($id)
    {
        $this->db->query("DELETE FROM products WHERE id=".$id."");
        $products['products'] = $this->db->query('SELECT * FROM products WHERE 1')->fetchAll();
        echo json_encode($products);
    }
    public function productCreate($name)
    {
        $sku_settings = $this->db->query("SELECT * FROM sku_settings WHERE 1")->fetchAll();
        $related_products = $this->db->query('SELECT sku FROM products WHERE sku LIKE "'.$sku_settings[0]["prefix"].'%"
        AND sku LIKE "%'.$sku_settings[0]["suffix"].'" ORDER BY sku')->fetchAll();
        $start = $sku_settings[0]['sku_index'];
        foreach ($related_products as $item) {
            if (strpos($item['sku'], (string)$start))
                $start++;
        }

        $this->db->query("INSERT INTO products (name, sku)
VALUES ('".$name."', '".$sku_settings[0]['prefix'].(string)$start.$sku_settings[0]['suffix']."')");

        $products['products'] = $this->db->query('SELECT * FROM products WHERE 1')->fetchAll();
        echo json_encode($products);
//        $related_products = ['PPR1000001-D', 'PPR1000005-D', 'PPR1000003-D'];
//        $start = 1000001;
//        foreach ($related_products as $item) {
//            if (strpos($item, (string)$start))
//                $start++;
//            else
//                break;
//        }
//        echo $start;

//        $products['products'] = $this->db->query('SELECT * FROM products WHERE 1')->fetchAll();
//        echo json_encode($start, $new_product);
    }

    public function responce($products, $sku_settings)
    {
        $response['products'] = $products;
        $response['sku_settings'] = $sku_settings;
        $response['response_code'] = 200;
        $json_response = json_encode($response);
        echo $json_response;
    }

    public function login($username, $password)
    {
        $result = $this->db->query("SELECT * FROM users WHERE login = '".$username."' AND password = '".md5($password)."'");
        return $result;
    }
}
