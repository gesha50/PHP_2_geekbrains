<?php
class AdminController extends Controller
{
    public $view = 'admin';
    public $title = 'Админка';

    public function __construct()
    {
        parent::__construct();
    }

    public function index($id)
    {
        $res = ['name' => $_SESSION['login'], 'text' => 'Работает!'];

        if ($id){
            $res['menuId'] .=  $id;
        }
     return $res;
    }

    public function goods($id)
    {
        $obj = new Catalog();
        $res = $obj->getGoods();
        if ($id){
            $res['menuId'] .=  $id;
        }
        return $res;
    }

    public function edit($id)
    {
        $obj = new Admin();
        return $obj->getItem($id);
    }

    public function newItemOrUpdate ($id) {
        if ($id){
            $res['menuId'] .=  $id;
        }

        if($_POST['submit']){
            $name = trim(strip_tags($_POST['name']));
            $desc = trim(strip_tags($_POST['desc']));
            $price = (int)trim(strip_tags($_POST['price']));

            $filePath  = $_FILES['img']['tmp_name'];
            $obj = new Image();
            $fileName  = $obj->translate($_FILES['img']['name']);
            $type = $_FILES['img']['type'];
            $size = $_FILES['img']['size'];
            define("DIR_BIG","img/big/");
            define("DIR_SMALL","img/small/");

            $obj2 = new Admin();

            if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
                if($size>0 and $size<100000000){
                    if(move_uploaded_file($filePath,"img/big/".$fileName)){
                        $obj->image_resize("img/big/".$fileName, "img/small/".$fileName, 250);
                        if(isset($_POST['edit'])){
                            $id = (int)trim(strip_tags($_POST['edit']));
                            $obj2->itemUpdate( $id, $name, $desc, $price, DIR_BIG.$fileName);
                            header("Location: index.php?path=admin/goods");
                        }
//                        else{
//                            $obj2->newItem( $name, $desc, $price, DIR_BIG.$fileName);
//                            header("Location: index.php?path=admin/goods");
//                        }

                        //$message = "<h3>Файл успешно загружен на сервер</h3>";
                    }
                }
            }
            //return $message;
        }
        return $res;
    }

    public function updateItem () {
        define("DIR_BIG","img/big/");
        define("DIR_SMALL","img/small/");
        if($_POST['submit']){
            $name = trim(strip_tags($_POST['name']));
            $desc = trim(strip_tags($_POST['desc']));
            $price = (int)trim(strip_tags($_POST['price']));

            if ($_FILES['img']['name']) {
                $fileName  = DIR_BIG;
                $filePath  = $_FILES['img']['tmp_name'];
                $obj = new Image();
                $fileName .= $obj->translate($_FILES['img']['name']);
                $type = $_FILES['img']['type'];
                $size = $_FILES['img']['size'];
            } else {
                $fileName = trim(strip_tags($_POST['image']));
            }

            $obj2 = new Admin();

//            if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
//                if($size>0 and $size<100000000){
                   // if(move_uploaded_file($filePath,"img/big/".$fileName)){
//                        //$obj->image_resize("img/big/".$fileName, "img/small/".$fileName, 250);

                        $id = (int)trim(strip_tags($_POST['edit']));
                        $obj2->itemUpdate( $id, $name, $desc, $price, $fileName);
                        header("Location: index.php?path=admin/goods");


                        //$message = "<h3>Файл успешно загружен на сервер</h3>";
//                    }
                    //}
//            }
//            //return $message;
        }
    }

    public function orders ($id) {
        $obj = new Admin();
        $res['orders'] = $obj->getOrders();
        if ($id){
            $res['menuId'] .=  $id;
        }
        return $res;
    }

    public function popup ($id) {
        //$id = (int)$id;
        $_GET['asAjax'] = true;
        $obj = new Admin();
        return $obj->getPopupOrder($id);
    }

    public function delete ($id) {
        $obj = new Admin();
        $obj->delete($id);
        header('location: index.php?path=admin/goods');
    }

}