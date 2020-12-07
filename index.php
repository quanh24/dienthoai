<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Phạm Quang Anh 74992</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="styles.css">
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<?php include('connect.php'); ?>
	<div class="container">
		<div class="bg-primary">
			<p>SẢN PHẨM NỔI BẬT</p>
		</div>
		<div class="row">
		<?php 
			$name = "";
			$maintain = "";
			$price = "";
			$image = "";
			$status = "";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if($_POST['btn'] == "Thêm"){
					if(isset($_POST['name']) && isset($_POST['image']) && isset($_POST['maintain']) && isset($_POST['status']) && isset($_POST['price']) && !empty($_POST['name']))
				{	
					$name = $_POST['name'];
					$maintain = $_POST['maintain'];
					$price = $_POST['price'];
					$image = $_POST['image'];
					$status = $_POST['status'];


						$sqlAdd = "INSERT INTO sanpham (name,maintain,price,image,status) VALUES ('$name','$maintain','$price','$image','$status')";
						if (mysqli_query($conn, $sqlAdd)) {
						      echo "Thêm sản phẩm thành công"; 
						} else {
						      echo "Error: " . $sqlAdd . "<br>" . mysqli_error($conn);
						  }
					}
					else{
						echo 'Hãy nhập tên sản phẩm !';
					}
				}
				if($_POST['btn'] == "Sửa"){
					$name = $_POST['name'];
					$maintain = $_POST['maintain'];
					$price = $_POST['price'];
					$image = $_POST['image'];
					$status = $_POST['status'];


						$sqlUpdate = "UPDATE sanpham SET name = '$name', maintain = '$maintain', price = '$price', image = '$image', status = '$status' WHERE name = '$name'	";
						if (mysqli_query($conn, $sqlUpdate)) {
						      echo "Sửa sản phẩm thành công"; 
						} else {
						      echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($conn);
						  }
					}
				if($_POST['btn'] == "Xóa"){
					$delete = $_POST['name'];

					$sqlDelete = "DELETE FROM sanpham WHERE name = '$delete'";
					if (mysqli_query($conn, $sqlDelete)) {
						      echo "Xóa sản phẩm thành công"; 
						} else {
						      echo "Error: " . $sqlDelete . "<br>" . mysqli_error($conn);
						  }
					}
				if ($_POST['btn'] == 'Tìm Kiếm') {}			
			}
				
			if(!isset($_POST['search'])){
				$sql = "SELECT * FROM sanpham";
				$result = mysqli_query($conn,$sql);
				if(mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)) {
				?>				
		
			<div class="col-lg-4">
				<div id="idProduct">	
					<div class="top">
						<img src="<?php echo $row['image'];?>" alt="" class="image">
						<p><?php echo $row['name']; ?></p>
						<p><?php echo '*Bảo hành:'.$row['maintain'].' tháng'; ?></p>
						<p><?php echo '*Trạng thái: '.(($row['status']) ? "còn hàng" : "hết hàng"); ?></p>
					</div>
					<div>
						<span class="bottom">Giá: <?php echo number_format($row['price']).'đ'; ?> </span>
						<span class="bottom">Chi tiết</span>
					</div>
				</div>
			</div>

				<?php 		
					}
				}
			}else{
				$querySearch = $_POST['search'];
				$querySearch = mysqli_query($conn,"SELECT * FROM sanpham WHERE name LIKE '%$querySearch%'");
				if(mysqli_num_rows($querySearch)){
					while($row = mysqli_fetch_assoc($querySearch)){
		 ?>
		 		<div class="col-lg-4">
				<div id="idProduct">	
					<div class="top">
						<img src="<?php echo $row['image'];?>" alt="" class="image">
						<p><?php echo $row['name']; ?></p>
						<p><?php echo '*Bảo hành:'.$row['maintain'].' tháng'; ?></p>
						<p><?php echo '*Trạng thái: '.(($row['status']) ? "còn hàng" : "hết hàng"); ?></p>
					</div>
					<div>
						<span class="bottom">Giá: <?php echo number_format($row['price']).'đ'; ?> </span>
						<span class="bottom">Chi tiết</span>
					</div>
				</div>
			</div>
			<?php 
				}
			}else{
				echo "Không tìm thấy sản phẩm nào !";
			}
		}
			 ?>
		 		</div>
			<form method="POST">
				<tr>
					<label>Tên sản phẩm:</label>
					<input type="text" id="input_Search" name="search">	
				</tr>
				<br><br>
				<input type="submit" onclick="check()" name="btn" value="Tìm kiếm">
				<table>
		 			<tr>
		 				<td>Tên sản phẩm</td>
		 				<td><input type="text" name="name"></td>
		 			</tr>
		 			<tr>
		 				<td>Hình ảnh sản phẩm:</td>
		 				<td><input type="file" name="image"></td>
		 			</tr>
		 			<tr>
		 				<td>Bảo hành:</td>
		 				<td><input type="text" name="maintain"></td>
		 			</tr>
		 			<tr>
		 				<td>Trạng thái:</td>
		 				<td>
		 					<input type="text" name="status">
		 				</td>
		 			</tr>
		 			<tr>
		 				<td>Giá:</td>
		 				<td><input type="text" name="price"></td>
		 			</tr>
		 			<tr>
		 				<td>
		 					<input type="submit" style="background-color: green;" name="btn" value="Thêm">
		 					<input type="submit" style="background-color: yellow;" name="btn" value="Sửa">
		 					<input type="submit" style="background-color: red;" name="btn" value="Xóa">
		 				</td>
		 			</tr>

		 	</table>
		 </form>
		 </div>
		 <script type="text/javascript" src="script.js"></script>
	</body>
</html>

