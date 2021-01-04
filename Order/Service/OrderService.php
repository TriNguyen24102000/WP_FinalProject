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

        public function insertorder(OrderDTO $orderDTO)
        {
            return $this->orderRepo->insertOrderToDB($orderDTO);
        }

        public function deleteOrder($id)
        {
            return $this->orderRepo->deleteOrderFromDB($id);
        }

        public function updateorder(OrderDTO $orderDTO)
        {
            return $this->orderRepo->updateorder($orderDTO);
        }        
    }

?>