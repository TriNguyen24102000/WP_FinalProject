<?php

include(__DIR__ . '/../Repository/OrderRepo.php');

class OrderService
{
    private $orderRepo;

    public function __construct(OrderRepo $orderRepo)
    {
        $this->orderRepo = $orderRepo;
    }

    public function getAllOrders()
    {
        return $this->orderRepo->getAllOrders();
    }

    public function getOrderByID($id)
    {
        return $this->orderRepo->getOrderByID($id);
    }

    public function insertOrder(OrderDTO $orderDTO)
    {
        return $this->orderRepo->insertOrderToDB($orderDTO);
    }

    public function deleteOrder($id)
    {
        return $this->orderRepo->deleteOrderFromDB($id);
    }

    public function updateOrder(OrderDTO $orderDTO)
    {
        return $this->orderRepo->updateOrder($orderDTO);
    }

    public function getLastOrder()
    {
        return $this->orderRepo->getLastOrderID();
    }

    public function insertOrderDetail($orderID, $productID, $quantity)
    {
        return $this->orderRepo->insertOrderDetail($orderID, $productID, $quantity);
    }
}
