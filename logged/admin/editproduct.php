<?php
include "admin_header.php";
include "../../dbconnection.php";
 
if (empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}
 
$id     = intval($_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
 
if (!$result || $result->num_rows === 0) {
    header("Location: index.php?error=Product not found");
    exit;
}
 
$p = $result->fetch_assoc();
?>
 
<div class="form-page-wrap">
 
    <?php if (!empty($_GET['error'])): ?>
        <div class="banner-error">⚠ <?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>
 
    <h2>✏ Edit Product</h2>
 
    <div class="form-card">
        <form action="../../functions/updateproduct.php" method="POST">
            <input type="hidden" name="productid" value="<?php echo $p['id']; ?>">
 
            <div class="form-row">
                <label>Product Name <span style="color:#ef4444">*</span></label>
                <input type="text" name="productname" value="<?php echo htmlspecialchars($p['productname']); ?>" required>
            </div>
 
            <div class="form-grid-2">
                <div class="form-row">
                    <label>Brand</label>
                    <input type="text" name="brand" value="<?php echo htmlspecialchars($p['brand']); ?>">
                </div>
                <div class="form-row">
                    <label>Stock (units)</label>
                    <input type="number" name="stock" value="<?php echo $p['stock']; ?>" min="0">
                </div>
            </div>
 
            <div class="form-grid-2">
                <div class="form-row">
                    <label>Price (Rs) <span style="color:#ef4444">*</span></label>
                    <input type="number" name="price" value="<?php echo $p['price']; ?>" min="0" required>
                </div>
                <div class="form-row">
                    <label>Discount (%)</label>
                    <input type="number" name="discountpercent" value="<?php echo $p['discountpercent']; ?>" min="0" max="100">
                </div>
            </div>
 
            <div class="form-row">
                <label>Description</label>
                <textarea name="description"><?php echo htmlspecialchars($p['description']); ?></textarea>
            </div>
 
            <div class="form-actions">
                <button type="submit" class="btn-save">Update Product</button>
                <a href="index.php" class="btn-cancel">Cancel</a>
            </div>
 
        </form>
    </div>
</div>
 
<?php include "admin_footer.php"; ?>