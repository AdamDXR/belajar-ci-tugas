<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\DiscountModel; 

class Home extends BaseController
{
    protected $productModel;
    protected $discountModel; 

    function __construct(){
        helper(['number', 'form']);
        $this->productModel = new ProductModel();
        $this->discountModel = new DiscountModel(); 
    }

    public function index()
    {
        $today = date('Y-m-d');
        $discount = $this->discountModel->where('tanggal', $today)->first();
        
        $nominalDiskon = 0;
        if ($discount) {
            $nominalDiskon = $discount['nominal'];
        }
        
        session()->set('diskon', $nominalDiskon);

        $products = $this->productModel->findAll();
        $data['products'] = $products;

        return view('v_home', $data);
    }

    public function profile()
    {
        return view('v_profile');
    }
}