<script>
	function delCat(){
		var confirmBox = confirm("Are u sure ab this?");
		return confirmBox;
	}
</script>
<?php
    if(isset($_GET['type'])){
        $type = $_GET['type'];
    }else{
        $type = 'product';
    }
	if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    $row_per_page = 5;
    $f_key = $page * 5 - $row_per_page;

    include_once('config/connect.php');
    if($type == 'month'){
    	$count = mysqli_num_rows(mysqli_query($connect, "select month(bill.purchase_time) as month, doanhthu.tong as doanhthu
															from bill left join(
															select bill.purchase_time as time, sum(bill.amount * product.prd_price) as tong from bill, product where product.prd_id = bill.prd_id group by month(bill.purchase_time)) as doanhthu
															on bill.purchase_time = time
															group by month(bill.purchase_time)
															order by month(bill.purchase_time)"));
    }else
    $count = mysqli_num_rows(mysqli_query($connect, "select * from $type"));

    $total = ceil($count/$row_per_page);

    $page_nav = '';
    $pre_nav = $page - 1;
    $next_nav = $page + 1;
    if($pre_nav <= 0) $pre_nav = 1;
    if($next_nav > $total) $next_nav = $total;
    $page_nav .= '<li class="page-item"><a class="page-link"href="admin.php?page_layout=sale&type='.$type.'&page='.$pre_nav.'">&laquo;</a></li>';
    	if($total <= 2){
    		for($temp = 1; $temp <= $total; $temp++){
                $page_nav .= '<li class="page-item ';
                if($temp == $page) $page_nav .= 'active';
                $page_nav .= '"><a class="page-link" href="admin.php?page_layout=sale&type='.$type.'&page='.$temp.'">'.$temp.'</a></li>';
            }
    	}
        else if($page <= $total - 2){
            $page_nav .= '<li class="page-item active"><a class="page-link" href="admin.php?page_layout=sale&type='.$type.'&page='.$page.'">'.$page.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=sale&type='.$type.'&page='.$next_nav.'">'.$next_nav.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
            $temp2 = $total - 1;
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=sale&type='.$type.'&page='.$temp2.'">'.$temp2.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=sale&type='.$type.'&page='.$total.'">'.$total.'</a></li>';
        } 
        else{
            $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
            for($temp = $total - 2; $temp < $total; $temp++){
                $page_nav .= '<li class="page-item ';
                if($temp == $page) $page_nav .= 'active';
                $page_nav .= '"><a class="page-link" href="admin.php?page_layout=sale&type='.$type.'&page='.$temp.'">'.$temp.'</a></li>';
            }
            $page_nav .= '<li class="page-item ';
            if($temp == $page) $page_nav .= 'active';
            $page_nav .= '"><a class="page-link" href="admin.php?page_layout=sale&type='.$type.'&page='.$total.'">'.$total.'</a></li>';
        } 
    $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=sale&type='.$type.'&page='.$next_nav.'">&raquo</a></li>';
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Doanh Thu Sản Phẩm</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<?php
					if($type == 'product'){
					?>
					<h1 class="page-header">Doanh Thu Sản Phẩm</h1>
				<?php
					}else if($type == 'category'){
				?>
					<h1 class="page-header">Doanh Thu Hãng</h1>
				<?php
					}else{
				?>
					<h1 class="page-header">Doanh Thu Tháng</h1>
				<?php
					}
				?>
				
			</div>
		</div>
		<div id="toolbar" class="btn-group">
            <a style="margin-right: 15px;" href="admin.php?page_layout=sale&type=product" class="btn btn-success ">
                <i class="glyphicon glyphicon-filter"></i> Doanh thu theo sản phẩm
            </a>
            <a style="margin-right: 15px;" href="admin.php?page_layout=sale&type=category" class="btn btn-success">
                <i class="glyphicon glyphicon-filter"></i> Doanh thu theo hãng
            </a>
            <a style="margin-right: 15px;" href="admin.php?page_layout=sale&type=month" class="btn btn-success">
                <i class="glyphicon glyphicon-filter"></i> Doanh thu theo tháng
            </a>

        </div>
		<!--/.row-->
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table 
									data-toolbar="#toolbar"
									data-toggle="table">
		
									<thead>
										<?php
											if($type == 'product'){
										?>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Tên sản phẩm</th>
										<th>Loại</th>
										<th>Hình ảnh</th>
										<th>Giá bán</th>
										<th>Tình trạng</th>
										<th>Tổng doanh thu</th>
									</tr>
									<?php
										}else if($type == 'category'){
									?>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Tên hãng</th>
										<th>Doanh thu</th>
									<?php
										}else{
									?>
										<th>Tháng</th>
										<th>Doanh thu</th>
									<?php	
										}
									?>
									</thead>
									<tbody>
										<?php

										if($type == 'product'){
											$sql_danh_sach = "select product.prd_id, product.prd_name,category.cat_name, product.prd_status, product.prd_image,product.prd_price,product.prd_warranty,ifnull(Tong.sum,0) as Doanhthu
											from category,product left join(
											select product.prd_id as id, sum(bill.amount * product.prd_price)  as sum from bill, product where product.prd_id = bill.prd_id group by bill.bill_id) as Tong
											on product.prd_id = id
											where category.cat_id = product.cat_id
											group by product.prd_id
											order by Tong.sum desc limit $f_key, $row_per_page;";
											$data_sql = mysqli_query($connect, $sql_danh_sach);

											while($row = mysqli_fetch_array($data_sql)){
												echo '<tr>
	                                                    <td style="">'.$row['prd_id'].'</td>
	                                                    <td style="">'.$row['prd_name'].'</td>
	                                                    <td style="">'.$row['cat_name'].'</td>
	                                                    <td style="text-align: center"><img width="130" height="180" src="products/'.$row['prd_image'].'" /></td>
	                                                    <td style="">'.$row['prd_price'].' đ</td>';

	                                            if($row['prd_status'] > 0) echo '<td><span class="label label-success">Còn hàng</span></td>';
	                                            else echo '<td><span class="label label-danger">Hết hàng</span></td>';

	                                            echo '
	                                                  <td>'.$row['Doanhthu'].'</td>
	                                                </tr>';
											}
										}else if($type == 'category'){
											$sql_danh_sach = "select category.cat_id, category.cat_name, doanhthu.tong as doanhthu
															from category left join(
															select category.cat_id as id, sum(bill.amount * product.prd_price) as tong from bill, product,category where product.prd_id = bill.prd_id and category.cat_id = product.cat_id group by category.cat_id) as doanhthu 
															on category.cat_id = id
															group by category.cat_id
															order by doanhthu.tong desc limit $f_key, $row_per_page;";
											$data_sql = mysqli_query($connect, $sql_danh_sach);

											while($row = mysqli_fetch_array($data_sql)){
												echo '<tr>
	                                                    <td style="">'.$row['cat_id'].'</td>
	                                                    <td style="">'.$row['cat_name'].'</td>
	                                                    <td style="">'.$row['doanhthu'].'</td>
	                                                </tr>';
											}
										}else{
											$sql_danh_sach = "select month(bill.purchase_time) as month, doanhthu.tong as doanhthu
															from bill left join(
															select bill.purchase_time as time, sum(bill.amount * product.prd_price) as tong from bill, product where product.prd_id = bill.prd_id group by month(bill.purchase_time)) as doanhthu
															on bill.purchase_time = time
															group by month(bill.purchase_time)
															order by month(bill.purchase_time) desc limit $f_key, $row_per_page;";
											$data_sql = mysqli_query($connect, $sql_danh_sach);

											while($row = mysqli_fetch_array($data_sql)){
												echo '<tr>
	                                                    <td style="">'.$row['month'].'</td>
	                                                    <td style="">'.$row['doanhthu'].'</td>
	                                                </tr>';
											}
										}
										
										
										?>
										
										
									</tbody>
								</table>
							</div>
							<div class="panel-footer text-center">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<?php
											echo $page_nav;
										?>
									</ul>
								</nav>
							</div>
						</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
