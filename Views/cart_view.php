<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GAMESFORYOU</title>

<style> 
/* Cart Container */
.cart-container {
    max-width: 1200px;
    margin: 40px auto;
    font-family: 'Segoe UI', sans-serif;
}

.cart-container * {
    box-sizing: border-box;
}

/* Cart Header */
.cart-container .cart-header {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 30px;
}

/* Cart Item */
.cart-container .cart-item {
    display: flex;
    align-items: center;
    padding: 15px;
    background: #fff;
    border-radius: 12px;
    margin-bottom: 15px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.cart-container .cart-item img {
    width: 100px;
    height: 100px;
    object-fit: contain;
    border-radius: 10px;
    margin-right: 20px;
}

.cart-container .cart-item-info {
    flex: 1;
}

.cart-container .cart-item-info h5 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
}

.cart-container .cart-item-info .price,
.cart-container .cart-item-info .quantity {
    color: #555;
    margin-top: 4px;
}

/* Item Total & Remove Button */
.cart-container .item-total {
    margin-left: 1rem;
    font-weight: bold;
}

.cart-container .btn-remove {
    margin-left: 1rem;
}

/* Cart Summary */
.cart-container .cart-summary {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}

.cart-container .cart-summary h4 {
    font-weight: 700;
    margin-bottom: 20px;
}
.cart-container .btn-checkout {
    background: #000;
    color: #fff;
    font-weight: 600;
    padding: 14px;
    border-radius: 8px;
    width: 100%;
    text-align: center;
    border: none;
}

.cart-container .btn-checkout:hover {
    background: #333;
    color: #fff;
}

/* Empty Cart */
.cart-container .empty-cart {
    text-align: center;
    background: #fff;
    padding: 60px;
    border-radius: 12px;
}

.cart-container .empty-cart i {
    font-size: 3rem;
    color: #888;
    margin-bottom: 15px;
}

.cart-container .empty-cart h5 {
    margin-bottom: 15px;
}
</style>
</head>
<body>

<div class="cart-container">
  

  <?php if (empty($cart)): ?>
    <div class="empty-cart">
      <i class="fa fa-shopping-cart fa-3x text-muted mb-3"></i>
      <h5>Your cart is empty</h5>
      <a href="<?= site_url('') ?>" class="btn btn-primary mt-3">Continue Shopping</a>
    </div>
  <?php else: ?>
    <div class="row">
      <div class="col-lg-8">
        <?php foreach ($cart as $item):
          $subtotal = $item['price'] * $item['quantity'];
          $imgUrl = base_url('images/' . basename($item['image']));
        ?>
        <div class="cart-item" data-id="<?= esc($item['id']) ?>" data-price="<?= esc($item['price']) ?>" data-quantity="<?= esc($item['quantity']) ?>">
          <img src="<?= esc($imgUrl) ?>" alt="<?= esc($item['name']) ?>">
          <div class="cart-item-info">
            <h5><?= esc($item['name']) ?></h5>
            <div class="price">£<?= number_format($item['price'], 2) ?></div>
            <div class="quantity">Quantity: <?= esc($item['quantity']) ?></div>
          </div>
          <div class="ml-4 font-weight-bold item-total">£<?= number_format($subtotal, 2) ?></div>
          <button class="btn btn-outline-danger ml-3 btn-remove"><i class="fa fa-trash"></i></button>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="col-lg-4">
        <div class="cart-summary">
          <h4>Order Summary</h4>
          <p class="d-flex justify-content-between">
            <span>Subtotal</span> <span id="cart-subtotal"></span>
          </p>
          <hr>
          <p class="d-flex justify-content-between font-weight-bold">
            <span>Total</span> <span id="cart-total"></span>
          </p>

          <form id="checkout-form" method="POST" action="<?= site_url('checkout/createSession') ?>">
            <input type="hidden" name="cartData" id="cart-data">
            <button class="btn btn-checkout btn-block">
              <i class="fa fa-credit-card mr-2"></i> Proceed to Checkout
            </button>
          </form>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>

<script>
const baseURL = "<?= site_url() ?>";
const csrfToken = "<?= csrf_hash() ?>";

// Populate cartData for checkout
document.getElementById('checkout-form').addEventListener('submit', function(e) {
  const cartItems = [];
  document.querySelectorAll('.cart-item').forEach(row => {
    cartItems.push({
      id: row.dataset.id,
      quantity: parseInt(row.dataset.quantity)
    });
  });
  document.getElementById('cart-data').value = JSON.stringify(cartItems);
});

// Recalculate totals
function recalcCart() {
  let subtotal = 0;
  document.querySelectorAll('.cart-item').forEach(row => {
    const price = parseFloat(row.dataset.price);
    const qty = parseInt(row.dataset.quantity);
    const total = price * qty;
    subtotal += total;
    row.querySelector('.item-total').textContent = '£' + total.toFixed(2);
  });

  document.getElementById('cart-subtotal').textContent = '£' + subtotal.toFixed(2);
  let delivery = subtotal > 50 ? 0 : 5;
  document.getElementById('cart-total').textContent = '£' + (subtotal + delivery).toFixed(2);
}

// Remove item
function removeItem(id, row) {
  fetch(`${baseURL}/cart/removeFromCart/${id}`, {
    method: 'POST',
    headers: { 'X-CSRF-TOKEN': csrfToken }
  }).then(r => r.json()).then(res => {
    if (res.success) {
      row.remove();
      recalcCart();
      if (document.querySelectorAll('.cart-item').length === 0) showEmptyCart();
    }
  });
}

// Show empty cart UI
function showEmptyCart() {
  const container = document.querySelector('.cart-container');
  container.innerHTML = `
    <div class="empty-cart">
      <i class="fa fa-shopping-cart fa-3x text-muted mb-3"></i>
      <h5>Your cart is empty</h5>
      
    </div>
  `;
}

// Event delegation for remove buttons
document.querySelector('.cart-container').addEventListener('click', e => {
  const row = e.target.closest('.cart-item');
  if (!row) return;
  if (e.target.closest('.btn-remove')) removeItem(row.dataset.id, row);
});

// Initial total calculation
recalcCart();
</script>

</body>
</html>


