<?php
class AdminController extends Controller
{
    public $view = 'admin';
    public $title = 'Админка';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $res = ['name' => $_SESSION['login'], 'text' => 'Работает!'];
     return $res;
    }

    public function goods()
    {
        $obj = new Catalog();
        return $obj->getGoods();
    }

    public function edit($id)
    {
        $obj = new Admin();
        return $obj->getItem($id);
    }

    public function newItemOrUpdate () {
        if($_POST['submit']){
            $name = trim(strip_tags($_POST['name']));
            $desc= trim(strip_tags($_POST['desc']));
            $price = (int)trim(strip_tags($_POST['price']));
            $obj = new Admin();
            if(isset($_POST['edit'])){
                $id = (int)trim(strip_tags($_POST['edit']));
                $obj->itemUpdate( $id, $name, $desc, $price);
                header("Location: index.php?path=admin/goods");
            }else{
                $obj->newItem( $name, $desc, $price);
                header("Location: index.php?path=admin/goods");
            }
        }
    }

    public function orders () {
        $obj = new Admin();
        return $obj->getOrders();
    }

    public function popup ($id) {
        $id = (int)$id;
        $_GET['asAjax'] = true;
        $obj = new Admin();
        return $obj->getPopupOrder($id);
    }

}