<?php
if(isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
} else {
    $tukhoa = '';
}
$sql_pro = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc = danhmuc.id_danhmuc AND sanpham.tensanpham LIKE '%".$tukhoa."%'";
$query_pro = mysqli_query($mysqli, $sql_pro);

?>
<h3>Từ khóa tìm kiếm : <?php $_POST['tukhoa'] ?></h3>
<ul class="product-list">
    <?php
    while ($row = mysqli_fetch_array($query_pro)) {
    ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img src="admin/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                <p class="title-product">Tên sản phẩm : <?php echo $row['tensanpham'] ?></p>
                <p class="price">Giá : <?php echo number_format($row['giasp'], 0, ',', '.') . 'VNĐ' ?></p>
                <p style="text-align: center; color: #d1d1d1;"><?php echo $row['tendanhmuc'] ?></p>
            </a>
        </li>
    <?php
    }
    ?>

</ul>