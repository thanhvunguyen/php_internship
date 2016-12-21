<?php 
	$db_connect = mysql_connect("localhost","root","");
	$db_select = mysql_select_db("thuctap",$db_connect);
	$set_lang = mysql_query("set names 'utf8'");

	$sql = "SELECT*FROM quanly_khachhang";
	$query = mysql_query($sql);
	$num_row = mysql_num_rows($query);
?>
<div class="quanlykhachhang">
	<table id="main-content">
		<tr id="main-navbar">
			<td colspan="6" class="tittle">quản lý khách hàng <a href="homePage.php?page=formkhachhang">thêm khách hàng(+)</a></td>
		</tr>
		<tr class="wrapInfo " id="active">
			<td colspan="" rowspan="">mã khách hàng</td>
			<td colspan="" rowspan="">tên khách hàng</td>
			<td colspan="" rowspan="">địa chỉ</td>
			<td colspan="" rowspan="">số cmnd</td>
			<td colspan="" rowspan="">sửa</td>
			<td colspan="" rowspan="">xóa</td>
		</tr>
		<?php 
			if($num_row >0){
				while ($rows = mysql_fetch_array($query)) {
			
		?>
		<tr class="wrapInfo">
			<td colspan="" rowspan=""><?php echo $rows["maKH"];?></td>
			<td colspan="" rowspan=""><?php echo $rows["tenKH"];?></td>
			<td colspan="" rowspan=""><?php echo $rows["diachi"];?></td>
			<td colspan="" rowspan=""><?php echo $rows["cmnd"];?></td>
			<td colspan="" rowspan=""><a href="homePage.php?page=suakhachhang&maKH=<?php echo $rows["maKH"]; ?>">sửa</a></td>
			<td colspan="" rowspan="" ><a href="homePage.php?page=xoakhachhang&maKH=<?php echo $rows["maKH"]; ?>" id="xoa" onclick="return confirm('Ban co chac chan muon xoa khong?')">xóa</a></td>
		</tr>
		<?php 
				}
			}else{
				echo "<script> alert('Du lieu chua co');</script>";
			}
		?>
	</table>	
</div>