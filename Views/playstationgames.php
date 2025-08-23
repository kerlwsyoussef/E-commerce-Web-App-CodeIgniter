<div class="container my-4">
    
    <form id="filterForm" class="row g-3 mb-4">

        <!-- Category -->
        <div class="col-md-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category" class="form-control">
                <option value="">All</option>
                <option value="action">Action</option>
                <option value="sports">Sports</option>
                <option value="rpg">RPG</option>
                <option value="shooter">Shooter</option>
                <option value="racing">Racer</option>
                <option value="fighting">Fighting</option>

            </select>
        </div>

        <!-- Price Range -->
        <div class="col-md-3">
            <label for="min_price" class="form-label">Min Price (£)</label>
            <input type="number" id="min_price" name="min_price" class="form-control" placeholder="0">
        </div>
        <div class="col-md-3">
            <label for="max_price" class="form-label">Max Price (£)</label>
            <input type="number" id="max_price" name="max_price" class="form-control" placeholder="100">
        </div>

        <!-- Sort -->
        <div class="col-md-3">
            <label for="sort" class="form-label">Sort By</label>
            <select id="sort" name="sort" class="form-control">
                <option value="">Default</option>
                <option value="price_asc">Price (Low → High)</option>
                <option value="price_desc">Price (High → Low)</option>
                <option value="name_asc">Name (A → Z)</option>
                <option value="name_desc">Name (Z → A)</option>
            </select>
        </div>

        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-dark">Apply Filters</button>
        </div>
    </form>








<div class="container my-5">

    <?php if (!empty($products)): ?>
        <div class="row g-4">
            <?php foreach ($products as $product): ?>
                <div class="col-md-3">
                    <div class="game-card border rounded shadow-sm p-3 h-100 d-flex flex-column justify-content-between">
                        <div class="game-image mb-3 text-center">
                            <img 
                                src="<?= !empty($product['image']) && file_exists(FCPATH . 'images/' . $product['image']) ? base_url('images/' . $product['image']) : base_url('images/default.png') ?>" 
                                alt="<?= esc($product['productname']) ?>" 
                                class="img-fluid rounded" 
                                style="max-height:200px; object-fit:cover;">
                        </div>
                        <div class="game-info text-center">
                            <h5 class="game-title mb-2"><?= esc($product['productname']) ?></h5>
                            <p class="game-price mb-3">£<?= number_format($product['price'], 2) ?></p>
                        </div>
                        <div class="game-actions text-center">
                            <a href="<?= site_url('product/view/' . $product['id']) ?>" class="btn btn-sm w-100 mb-2" style="background:black; color:white;">View Details</a>
                            
                            <!-- Add to Cart AJAX Form -->
                            <form class="add-to-cart-form" method="POST" action="<?= site_url('product/addToCart/' . $product['id']) ?>">
                                <button type="submit" class="btn btn-sm w-100" style="background:black; color:white;">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center my-5">
            <i class="fa fa-gamepad fa-3x text-muted mb-3"></i>
            <h5>No Playstation games found.</h5>
            <a href="<?= site_url() ?>" class="btn btn-primary mt-3">Go Back</a>
        </div>
    <?php endif; ?>
</div>

<!-- Toast Notification -->
<div id="toast" style="
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #28a745;
    color: white;
    padding: 12px 20px;
    border-radius: 6px;
    display: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    z-index: 9999;
">
    Added to Cart!
</div>

<style>
.game-card {
    transition: transform 0.2s, box-shadow 0.2s;
}
.game-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}
.game-title {
    font-weight: 600;
    font-size: 1rem;
}
.game-price {
    font-weight: 500;
    color: #28a745;
}
.game-image img {
    object-fit: cover;
}
</style>

<script>
// CSRF token
const csrfToken = "<?= csrf_hash() ?>";

// Toast helper
function showToast(message) {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.style.display = 'block';
    setTimeout(() => {
        toast.style.display = 'none';
    }, 2000); // disappears after 2 seconds
}

// Live Add to Cart
document.querySelectorAll('.add-to-cart-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        fetch(form.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ quantity: 1 })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showToast('Added to Cart!');
            } else {
                showToast('Failed to add to cart.');
            }
        })
        .catch(err => {
            console.error('Error adding to cart:', err);
            showToast('Error adding to cart.');
        });
    });
});
</script>








 


     
     
   
    
    
    
    
    
    









