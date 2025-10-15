<?php require_once "./views/layouts/header.php"; ?>

<div class="container mt-5 mb-5">
    <h2>Search results for: <strong><?= htmlspecialchars($_SESSION['search_query'] ?? '') ?></strong></h2>
    <hr>

    <?php if (!empty($_SESSION['search_results'])): ?>
    <div class="row">
        <?php foreach ($_SESSION['search_results'] as $product): ?>
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="<?= htmlspecialchars($product['image'] ?? '/assets/img/default.png') ?>" class="card-img-top"
                    alt="Product">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($product['name'] ?? '') ?></h5>
                    <p class="card-text">$<?= htmlspecialchars($product['price'] ?? '') ?></p>
                    <a href="index.php?page=product-details&id=<?= $product['id'] ?>" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <p>No products found for your search.</p>
    <?php endif; ?>
</div>

<?php 
unset($_SESSION['search_results']);
unset($_SESSION['search_query']);
require_once "./views/layouts/footer.php"; 
?>