<?php

namespace App\Controllers;

use App\Models\DiscountModel;

class DiscountController extends BaseController
{
    protected $discountModel;

    public function __construct()
    {
        helper('form');
        $this->discountModel = new DiscountModel();
    }

    public function index()
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $data = [
            'discounts' => $this->discountModel->findAll()
        ];

        // Path dikembalikan langsung ke v_diskon
        return view('v_diskon', $data);
    }

    public function create()
    {
        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required|is_unique[discount.tanggal]',
                'errors' => [
                    'required' => 'Tanggal harus diisi.',
                    'is_unique' => 'Diskon pada tanggal tersebut sudah ada! Silakan pilih tanggal lain.'
                ]
            ],
            'nominal' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nominal harus diisi.',
                    'numeric' => 'Nominal harus berupa angka.'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/diskon');
        }

        $this->discountModel->save([
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal')
        ]);

        session()->setFlashdata('success', 'Data diskon berhasil ditambahkan.');
        return redirect()->to('/diskon');
    }

    public function edit($id)
    {
        $this->discountModel->save([
            'id'      => $id,
            'nominal' => $this->request->getPost('nominal')
        ]);

        session()->setFlashdata('success', 'Data diskon berhasil diubah.');
        return redirect()->to('/diskon');
    }

    public function delete($id)
    {
        $this->discountModel->delete($id);
        session()->setFlashdata('success', 'Data diskon berhasil dihapus.');
        return redirect()->to('/diskon');
    }
}