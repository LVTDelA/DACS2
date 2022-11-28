<?php

namespace App\Repositories\OrderDetail;

use App\Models\OrderDetail;
use App\Repositories\BaseRepositories;

class OrderDetailRepository extends BaseRepositories implements OrderDetailRepositoryInterface
{

    public function getModel()
    {
        return OrderDetail::class;
    }

    public function deleteAllOrderDetailByIdOrder($id_order)
    {
        $this->model->where('id_order', $id_order)->delete();
    }
}
