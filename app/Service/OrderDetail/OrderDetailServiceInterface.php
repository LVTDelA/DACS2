<?php

namespace App\Service\OrderDetail;
use App\Service\ServiceInterface;

interface OrderDetailServiceInterface extends ServiceInterface
{
    public function deleteAllOrderDetailByIdOrder($id_order);
}
