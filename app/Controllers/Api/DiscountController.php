<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DiscountModel;

class DiscountController extends ResourceController
{
    protected $modelName = DiscountModel::class;
    protected $format    = 'json';

    // GET /api/discounts
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /api/discounts/{id}
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $this->respond($data);
        }
        return $this->failNotFound('Data diskon tidak ditemukan.');
    }

    // POST /api/discounts
    public function create()
    {
        $rules = [
            'tanggal' => 'required|is_unique[discount.tanggal]',
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = [
            'tanggal' => $this->request->getVar('tanggal'),
            'nominal' => $this->request->getVar('nominal')
        ];

        $this->model->insert($data);
        return $this->respondCreated([
            'status'   => 201,
            'messages' => ['success' => 'Data diskon berhasil ditambahkan.']
        ]);
    }

    // PUT/PATCH /api/discounts/{id}
    public function update($id = null)
    {
        // Berdasarkan Soal 3, yang boleh diupdate hanya nominal
        $rules = [
            'nominal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = [
            'nominal' => $this->request->getRawInputVar('nominal')
        ];

        $this->model->update($id, $data);
        return $this->respond([
            'status'   => 200,
            'messages' => ['success' => 'Data diskon berhasil diubah.']
        ]);
    }

    // DELETE /api/discounts/{id}
    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            $this->model->delete($id);
            return $this->respondDeleted([
                'status'   => 200,
                'messages' => ['success' => 'Data diskon berhasil dihapus.']
            ]);
        }
        return $this->failNotFound('Data diskon tidak ditemukan.');
    }
}