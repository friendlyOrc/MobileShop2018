<?php
    $sum = 0;
    $price;
    if(isset($_POST['sbm'])){
        foreach ($_POST['num'] as $key => $value) {
            $_SESSION['cart'][$key] = $value;
        }
    }
    if(isset($_SESSION['cart'])){
        $array_id = array();
        foreach ($_SESSION['cart'] as $key => $value) {
            $array_id[] = $key;
        }
        // print_r($_SESSION['cart']);
        $string_id = implode(',', $array_id);
        // echo $string_id;
        $data = mysqli_query($connect, "select * from product where prd_id IN( $string_id )");
?>
                <!--	Cart	-->
                <div id="my-cart">
                	<div class="row">
                        <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div> 
                        <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div> 
                        <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>    
                    </div>  
                    <form method="post">
                        <?php
                            while($prd = mysqli_fetch_array($data)){
                                $price = $prd['prd_price']*$_SESSION['cart'][$prd['prd_id']];
                            ?>   
                            <div class="cart-item row">
                                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                                    <img <?php echo 'src="admin/products/'.$prd['prd_image'].'"'; ?> >
                                    <h4><?php echo $prd['prd_name']; ?></h4>
                                </div> 
                                
                                <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                                    <input type="number" id="quantity" class="form-control form-blue quantity" <?php echo 'value="'.$_SESSION['cart'][$prd['prd_id']].'"'?> min="1"
                                    name="num[<?php echo $prd['prd_id']; ?>]">
                                </div> 
                                <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo $price; ?></b><a href="templates/cart/del_cart.php?id=<?php echo $prd['prd_id'];?>">Xóa</a></div>    
                            </div>  
                        <?php
                            $sum += $_SESSION['cart'][$prd['prd_id']]*$prd['prd_price'];
                            }
                        ?>
                        <div class="row">
                        <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                            <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button>    
                        </div> 
                        <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div> 
                        <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo $sum;?>đ</b></div>
                    </div>
                    </form>
                               
                </div>
                <!--    End Cart    -->

                <!--    Customer Info   -->
                <?php
                    if(isset($_POST['send_bill'])){
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $user_mail = $_POST['mail'];
                        $add = $_POST['add'];

                        $string_id = implode(',', $array_id);
                        // echo $string_id;
                        $data = mysqli_query($connect, "select * from product where prd_id IN( $string_id )");

                        $btop = mysqli_fetch_array(mysqli_query($connect, "select * from bill order by bill_id desc limit 1"));
                        $ctop = mysqli_fetch_array(mysqli_query($connect, "select * from customer order by cus_id desc limit 1"));
                        $bid = $btop['bill_id'] + 1;
                        $cid = $ctop['cus_id'] + 1;
                        mysqli_query($connect, "insert into customer(cus_id, cus_name, cus_phone, cus_mail, cus_adr) VALUES
                            ('$cid', '$name', '$phone', '$user_mail', '$add');");
                        while($prd = mysqli_fetch_array($data)){
                            $time = date("Y/m/d");
                            $prd_id = $prd['prd_id'];
                            $amount = $_SESSION['cart'][$prd['prd_id']];
                            $run = mysqli_query($connect, "insert into bill(bill_id, cus_id, prd_id, amount, purchase_time) VALUES 
                                    ('$bid', '$cid', '$prd_id', '$amount', '$time');");
                        }
                        // echo $customer_bill;
                        session_destroy();
                        header('location:index.php?page_layout=success');
                    }

                ?>
                <div id="customer">
                    <form method="post">
                    <div class="row">
                        
                        <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                            <input placeholder="Họ và tên (bắt buộc)" type="text" name="name" class="form-control" required>
                        </div>
                        <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                            <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control" required>
                        </div>
                        <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                            <input placeholder="Email (bắt buộc)" type="text" name="mail" class="form-control" required>
                        </div>
                        <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                            <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="add" class="form-control" required>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="by-now col-lg-6 col-md-6 col-sm-12">
                            <button type="submit" name="send_bill">
                                <b>Mua ngay</b>
                                <span>Giao hàng tận nơi siêu tốc</span>
                            </button>
                        </div>
                        <div class="by-now col-lg-6 col-md-6 col-sm-12">
                            <button type="submit" name="send_bill2">
                                <b>Trả góp Online</b>
                                <span>Vui lòng call (+84) 0988 550 553</span>
                            </button>
                        </div>
                    </div>
                    </form>
                    
                </div>
                <!--    End Customer Info   -->
 <?php
}else{
    echo '<div class="alert alert-danger">Giỏ hàng trống!</div>';
}
 ?>                   
                    
                    
                
                
                
         
