<?php

class OrderController extends Controller
{
    public $view = 'order';
    public $title;
    public $order_id;

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if(isset($_POST['order'])) {
            if ($_POST['typeSend'] == 0) {
                $delivery = "Самовывоз";
            } elseif ($_POST['typeSend'] == 1) {
                $delivery = "Курьерская";
            }
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            if ($_POST['persons']) {
                $persons = $_POST['persons'];
            } else {
                $persons = '0';
            }
            if ($_POST['pay'] == 0) {
                $pay = "Наличные";
            } elseif ($_POST['pay'] == 1) {
                $pay = "Кредитная карта";
            }
            if ($_POST['desiredTime']) {
                $desiredTime = $_POST['desiredTime'];
            } else {
                $desiredTime = '-';
            }
            if ($_POST['money']) {
                $money = $_POST['money'];
            } else {
                $money = 0;
            }
            if ($_POST['address']) {
                $address = $_POST['address'];
            } else {
                $address = '-';
            }
            if ($_POST['comment']) {
                $comment = $_POST['comment'];
            } else {
                $comment = '-';
            }
        }
        $obj = new Order($delivery,$name,$phone,$persons,$pay,$desiredTime,$money,$address,$comment);
        $obj->copyToManager();
        $obj->deleteFromCart();
        $this->order_id = $obj->order_id;
        $res = $obj->order_id;
        // Для того чтобы форма повторно не отправлялась!
        header('location: index.php?path=order/getOrderId&res='.$res);
    }

   public function getOrderId()
    {
        return (int)$_GET['res'];
    }
}