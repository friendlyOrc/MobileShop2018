<script>
	function delCat(){
		var confirmBox = confirm("Are u sure ab this?");
		return confirmBox;
	}
</script>
<?php
	if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    $row_per_page = 5;
    $f_key = $page * 5 - $row_per_page;

    include_once('config/connect.php');
    $count = mysqli_num_rows(mysqli_query($connect, "select * from customer"));

    $total = ceil($count/$row_per_page);

    $page_nav = '';
    $pre_nav = $page - 1;
    $next_nav = $page + 1;
    if($pre_nav <= 0) $pre_nav = 1;
    if($next_nav > $total) $next_nav = $total;
    $page_nav .= '<li class="page-item"><a class="page-link"href="admin.php?page_layout=customer&page='.$pre_nav.'">&laquo;</a></li>';
    	if($total <= 2){
    		for($temp = 1; $temp <= $total; $temp++){
                $page_nav .= '<li class="page-item ';
                if($temp == $page) $page_nav .= 'active';
                $page_nav .= '"><a class="page-link" href="admin.php?page_layout=customer&page='.$temp.'">'.$temp.'</a></li>';
            }
    	}
        else if($page <= $total - 2){
            $page_nav .= '<li class="page-item active"><a class="page-link" href="admin.php?page_layout=customer&page='.$page.'">'.$page.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=customer&page='.$next_nav.'">'.$next_nav.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
            $temp2 = $total - 1;
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=customer&page='.$temp2.'">'.$temp2.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=customer&page='.$total.'">'.$total.'</a></li>';
        } 
        else{
            $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
            for($temp = $total - 2; $temp < $total; $temp++){
                $page_nav .= '<li class="page-item ';
                if($temp == $page) $page_nav .= 'active';
                $page_nav .= '"><a class="page-link" href="admin.php?page_layout=customer&page='.$temp.'">'.$temp.'</a></li>';
            }
            $page_nav .= '<li class="page-item ';
            if($temp == $page) $page_nav .= 'active';
            $page_nav .= '"><a class="page-link" href="admin.php?page_layout=customer&page='.$total.'">'.$total.'</a></li>';
        } 
    $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=customer&page='.$next_nav.'">&raquo</a></li>';
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý khách hàng</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách khách hàng</h1>
			</div>
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
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Tên người mua</th>
										<th>SDT</th>
										<th>Email</th>
										<th>Địa chỉ</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$sql = "select * from customer order by cus_id limit $f_key, $row_per_page";
										$data = mysqli_query($connect, $sql);
										while($row = mysqli_fetch_array($data)){
										?>
										<tr>
                                            <td style=""><?php echo $row['cus_id'];?></td>
                                            <td style=""><?php echo $row['cus_name'];?></td>
                                            <td style=""><?php echo $row['cus_phone'];?></td>
                                            <td style=""><?php echo $row['cus_mail'];?></td>
                                            <td style=""><?php echo $row['cus_adr'];?></td>
                                        </tr>
										<?php

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
