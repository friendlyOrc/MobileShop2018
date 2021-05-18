
    <!--	List Product	-->
    <div id="product">
    	<div id="product-head" class="row">

            <?php
                $id = $_GET['id'];
                $prd = mysqli_fetch_array(mysqli_query($connect, "select * from product where prd_id = $id"));
                echo '<div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
                            <img src="admin/products/'.$prd['prd_image'].'">
                        </div>
                        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
                            <h1>'.$prd['prd_name'].'</h1>
                            <ul>
                                <li><span>Bảo hành:</span> '.$prd['prd_warranty'].'</li>
                                <li><span>Đi kèm:</span> '.$prd['prd_accessories'].'</li>
                                <li><span>Tình trạng:</span> '.$prd['prd_new'].'</li>
                                <li><span>Khuyến Mại:</span> '.$prd['prd_promotion'].'</li>
                                <li id="price">Giá Bán (chưa bao gồm VAT)</li>
                                <li id="price-number">'.$prd['prd_price'].'</li>';

                if($prd['prd_status'] == 1) echo '<li id="status">Còn hàng</li>';
                else echo '<li id="status">Hết hàng</li>';
                echo '</ul>
                            <div id="add-cart"><a href="templates/cart/add_cart.php?prd_id='.$prd['prd_id'].'">Mua ngay</a></div>
                        </div>';
            ?>
        	
        </div>
        <div id="product-body" class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3>Đánh giá về iPhone X 64GB</h3>
                <?php
                    echo '<p>'.$prd['prd_details'].'</p>';
                ?>
                
            </div>
        </div>
        
        <!--	Comment	-->
        <?php
            
            if(isset($_POST['sbm'])){
                $name = $_POST['comm_name'];
                $mail = $_POST['comm_mail'];
                $detail = $_POST['comm_details'];

                date_default_timezone_set('Asia/Bangkok');
                $time = date('Y-m-d H:i:s');
                
                $sql_abc = "insert into comment(prd_id, comm_name, comm_mail, comm_date, comm_details) values('$id', '$name', '$mail', '$time', '$detail')";
                mysqli_query($connect, $sql_abc);
            }
        ?>
        <div id="comment" class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3>Bình luận sản phẩm</h3>
                <form method="post">
                    <div class="form-group">
                        <label>Tên:</label>
                        <input name="comm_name" required type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input name="comm_mail" required type="email" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label>Nội dung:</label>
                        <textarea name="comm_details" required rows="8" class="form-control"></textarea>     
                    </div>
                    <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
                </form> 
            </div>
        </div>
        <!--	End Comment	-->  
        
        <!--	Comments List	-->
        <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else {
                $page = 1;
            }
            $count = mysqli_num_rows(mysqli_query($connect, "select * from comment where prd_id = $id"));

            $f_key = 0;
            $item_per_page = 3;
            $f_key = $page * 3 - $item_per_page;
            $total = ceil($count/$item_per_page);

            $page_nav = '';
            $pre_nav = $page - 1;
            $next_nav = $page + 1;
            if($pre_nav <= 0) $pre_nav = 1;
            if($next_nav > $total) $next_nav = $total;
            $page_nav .= '<li class="page-item"><a class="page-link"href="index.php?page_layout=product&id='.$id.'&page='.$pre_nav.'">Trang trước</a></li>';
                if($total <= 3){
                    for($i = 1; $i <= $total; $i++){
                        $page_nav .= '<li class="page-item';
                        if($i == $page) $page_nav .= ' active';
                        $page_nav .= '"><a class="page-link" href="index.php?page_layout=product&id='.$id.'&page='.$page.'">'.$page.'</a></li>';
                    }
                }else{
                    if($page < $total - 2){
                        $page_nav .= '<li class="page-item active"><a class="page-link" href="index.php?page_layout=product&id='.$id.'&page='.$page.'">'.$page.'</a></li>';
                        $page_nav .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&id='.$id.'&page='.$next_nav.'">'.$next_nav.'</a></li>';
                        $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                        $temp2 = $total - 1;
                        $page_nav .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&id='.$id.'&page='.$temp2.'">'.$temp2.'</a></li>';
                        $page_nav .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&id='.$id.'&page='.$total.'">'.$total.'</a></li>';
                    } 
                    else{
                        $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                        for($temp = $total - 2; $temp < $total; $temp++){
                            $page_nav .= '<li class="page-item ';
                            if($temp == $page) $page_nav .= 'active';
                            $page_nav .= '"><a class="page-link" href="index.php?page_layout=product&id='.$id.'&page='.$temp.'">'.$temp.'</a></li>';
                        }
                        $page_nav .= '<li class="page-item ';
                        if($temp == $page) $page_nav .= 'active';
                        $page_nav .= '"><a class="page-link" href="index.php?page_layout=product&id='.$id.'&page='.$total.'">'.$total.'</a></li>';
                    }
                }
                 
            $page_nav .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&id='.$id.'&page='.$next_nav.'">Trang sau</a></li>';
        ?>
        <div id="comments-list" class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
                <?php
                    $data = mysqli_query($connect, "select * from comment where prd_id = $id order by comm_id");
                    while($row = mysqli_fetch_array($data)){
                        // htmlspecialchars fucntion: output something to the browser that came from the user input.
                        echo '<div class="comment-item">
                                <ul>
                                    <li><b>'.$row['comm_name'].'</b></li>
                                    <li>'.$row['comm_date'].'</li>
                                    <li>
                                        <p>'.htmlspecialchars($row['comm_details'], ENT_QUOTES, 'UTF-8').'</p>
                                    </li>
                                </ul>
                              </div>  ';
                    }
                ?>
                
            </div>
        </div>
        <!--	End Comments List	-->
    </div>
    <!--	End Product	--> 
    <div id="pagination">
        <ul class="pagination">
            <?php
                echo $page_nav;
            ?>
        </ul> 
    </div>        
            
            