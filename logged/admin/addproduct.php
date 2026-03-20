<?php include "admin_header.php"; ?>
 
<div class="form-page-wrap">
 
    <?php if (!empty($_GET['error'])): ?>
        <div class="banner-error">⚠ <?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>
 
    <h2>➕ Add New Product</h2>
 
    <div class="form-card">
        <form action="../../functions/storeproduct.php" method="POST">
 
            <div class="form-row">
                <label>Product Name <span style="color:#ef4444">*</span></label>
                <input type="text" name="productname" placeholder="e.g. iPhone 16 Pro Max" required>
            </div>
 
            <div class="form-grid-2">
                <div class="form-row">
                    <label>Brand</label>
                    <input type="text" name="brand" placeholder="e.g. Apple">
                </div>
                <div class="form-row">
                    <label>Stock (units)</label>
                    <input type="number" name="stock" placeholder="e.g. 50" min="0" value="0">
                </div>
            </div>
 
            <div class="form-grid-2">
                <div class="form-row">
                    <label>Price (Rs) <span style="color:#ef4444">*</span></label>
                    <input type="number" name="price" placeholder="e.g. 150000" min="0" required>
                </div>
                <div class="form-row">
                    <label>Discount (%)</label>
                    <input type="number" name="discountpercent" placeholder="e.g. 10" min="0" max="100" value="0">
                </div>
            </div>
 
            <div class="form-row">
                <label>Description</label>
                <textarea name="description" placeholder="Short product description..."></textarea>
            </div>
 
            <div class="form-actions">
                <button type="submit" class="btn-save">Save Product</button>
                <a href="index.php" class="btn-cancel">Cancel</a>
            </div>
 
        </form>
    </div>
</div>
 
<?php include "admin_footer.php"; ?>