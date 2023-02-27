<?php
$sql_pro = "SELECT * FROM sanpham WHERE sanpham.id_danhmuc = '$_GET[id]' ORDER BY id_sanpham DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);
//Lấy tên danh mục
$sql_cate = "SELECT * FROM danhmuc WHERE danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<h3>Danh mục sản phẩm : <?php echo $row_title['tendanhmuc'] ?? 'Hiện tại trống.' ?></h3>
<ul class="product-list">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro)) {
    ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
                <img src="admin/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                <p class="title-product"><?php echo $row_pro['tensanpham'] ?></p>
                <p class="price"><?php echo number_format($row_pro['giasp'], 0, ',', '.') . ' VNĐ' ?></p>
            </a>
        </li>
    <?php
    }
    ?>

</ul>