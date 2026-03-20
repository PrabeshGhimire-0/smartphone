<?php
include "admin_header.php";
include "../../dbconnection.php";
$result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
?>
 
<div class="table-page-wrap">
 
    <?php if (!empty($_GET['success'])): ?>
        <div class="banner-success">✅ <?php echo htmlspecialchars($_GET['success']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_GET['error'])): ?>
        <div class="banner-error">⚠ <?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>
 
    <div class="table-topbar">
        <h2>All Products</h2>
        <a href="addproduct.php" class="btn-primary">➕ Add New Product</a>
    </div>
 
    <table class="products-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Brand</th>
                <th>Price (Rs)</th>
                <th>Discount</th>
                <th>Final Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result && $result->num_rows > 0):
            $n = 1;
            while ($p = $result->fetch_assoc()):
                $final = ($p['discountpercent'] > 0)
                    ? round($p['price'] * (1 - $p['discountpercent'] / 100))
                    : $p['price'];
        ?>
            <tr>
                <td><?php echo $n++; ?></td>
                <td><span class="pname"><?php echo htmlspecialchars($p['productname']); ?></span></td>
                <td><span class="tbl-brand"><?php echo htmlspecialchars($p['brand']); ?></span></td>
                <td>Rs <?php echo number_format($p['price']); ?></td>
                <td><?php echo $p['discountpercent'] > 0 ? $p['discountpercent'] . '%' : '—'; ?></td>
                <td><strong>Rs <?php echo number_format($final); ?></strong></td>
                <td>
                    <?php if ($p['stock'] > 0): ?>
                        <span class="tbl-stock-in"><?php echo $p['stock']; ?> units</span>
                    <?php else: ?>
                        <span class="tbl-stock-out">Out</span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="action-btns">
                        <a href="editproduct.php?id=<?php echo $p['id']; ?>" class="btn-edit">✏ Edit</a>
                        <!-- Delete: a simple form, no JS needed -->
                        <form class="btn-delete-form" action="../../functions/deleteproduct.php" method="POST"
                              onsubmit="return confirm('Delete this product?');">
                            <input type="hidden" name="productid" value="<?php echo $p['id']; ?>">
                            <button type="submit">🗑 Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php
            endwhile;
        else:
        ?>
            <tr>
                <td colspan="8">
                    <div class="no-data">
                        <div class="icon">📦</div>
                        <p>No products yet. <a href="addproduct.php" style="color:#6366f1;">Add your first one.</a></p>
                    </div>
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
 
<?php include "admin_footer.php"; ?>