<script src="ckeditor/ckeditor.js"></script>
<?php
    include_once('config/connect.php');
    $id = $_GET['id'];
    $sql_find = "select * from product where prd_id = '$id'";
    $data = mysqli_query($connect, $sql_find);
    $prd = mysqli_fetch_array($data);
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý sản phẩm</a></li>
				<li class="active"><?php echo $prd['prd_name'];?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm: <?php echo $prd['prd_name'];?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <?php

                                if(isset($_POST['sbm'])){
                                    $name = $_POST['prd_name'];          
                                    $price = $_POST['prd_price'];
                                    $warr = $_POST['prd_warranty'];  
                                    $acc = $_POST['prd_accessories'];  
                                    $pro = $_POST['prd_promotion'];   
                                    $nid = $_POST['cat_id'];
                                    $stt = $_POST['prd_status'];  
                                    $new = $_POST['prd_new'];
                                    if(isset($_POST['prd_featured'])){
                                        $ftt = $_POST['prd_featured'];
                                    }else{
                                        $ftt = 0;
                                    }
                                    $dt = $_POST['prd_details'];

                                    $image = $prd['prd_image'];
                                    if($_FILES['prd_img']['name'] != ""){
                                        $image = $_FILES['prd_img']['name']; 
                                        $tmp_image = $_FILES['prd_img']['tmp_name'];
                                        move_uploaded_file($tmp_image, 'products/'.$image);
                                    }

                                    $sql_upd = "update product 
                                                    set prd_name = '$name', prd_price = '$price', prd_warranty = '$warr', prd_accessories = '$acc', prd_promotion = '$pro', prd_image = '$image', cat_id = '$nid', prd_new = '$new', prd_status = '$stt', prd_featured = '$ftt', prd_details = '$dt'
                                                    where prd_id = '$id';";
                                    $data_sql = mysqli_query($connect, $sql_upd);
                                    header('location: admin.php?page_layout=product');
                                }

                                ?>
                                <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="prd_name" required class="form-control" 
                                        <?php echo 'value = "'.$prd['prd_name'].'"';?>  
                                    placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" name="prd_price" required 
                                        <?php echo 'value = "'.$prd['prd_price'].'"';?> 
                                    class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input type="text" name="prd_warranty" required 
                                        <?php echo 'value = "'.$prd['prd_warranty'].'"';?> 
                                    class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input type="text" name="prd_accessories" required  
                                        <?php echo 'value = "'.$prd['prd_accessories'].'"';?>  
                                    class="form-control">
                                </div>                  
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input type="text" name="prd_promotion" required  
                                        <?php echo 'value = "'.$prd['prd_promotion'].'"';?> 
                                    class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input type="text" name="prd_new" required 
                                        <?php echo 'value = "'.$prd['prd_new'].'"';?> 
                                    type="text" class="form-control">
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input type="file" name="prd_img">
                                    <br>
                                    <div>
                                        <?php echo '<img src="products/'.$prd['prd_image'].'">';?> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cat_id" class="form-control">
                                        <?php

                                        include_once('config/connect.php');
                                        $sql_danh_sach = "select * from category order by cat_id";
                                        $data_sql = mysqli_query($connect, $sql_danh_sach);

                                        while($row = mysqli_fetch_array($data_sql)){
                                            if($prd['cat_id'] == $row['cat_id']) 
                                                echo '<option selected value='.$row['cat_id'].'>'.$row['cat_name'].'</option>';
                                            echo '<option value='.$row['cat_id'].'>'.$row['cat_name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="prd_status" class="form-control">
                                        <?php
                                            if($prd['prd_status'] == '1')
                                                echo '<option selected value=1>Còn hàng</option>
                                                <option value=0>Hết hàng</option>';
                                            else echo '<option value=1>Còn hàng</option>
                                                <option selected value=0>Hết hàng</option>';
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" value=1
                                            <?php
                                                if($prd['prd_featured'] == '1')
                                                    echo 'checked';
                                            ?>
                                            >Nổi bật
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea id="editor1"name="prd_details" required class="form-control" rows="3"><?php
                                                echo $prd['prd_details'];
                                            ?>
                                        </textarea>
                                        <script>
                                            CKEDITOR.replace('prd_details');
                                        </script>
                                    </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
	</div>	<!--/.main-->	
