<html lang="en">
<head>
<meta charset="utf-8"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Include Font Awesome CSS -->

<body>
    <section class="py-5">
        <div class="container">
            <h2>Shopping Cart</h2>
            <?php if (empty($cart)) : ?>
                <p>Your cart is empty.</p>
            <?php else : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                           
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0; // Initialize total price variable
                        foreach ($cart as $item) : 
                            $itemTotal = (float)$item['price'] * (int)$item['quantity']; // Calculate item total
                            $total += $itemTotal; // Accumulate total price
                        ?>
                            <tr>
                                <td><?= esc($item['name']) ?></td>
                                <td>£ <?= esc($item['price']) ?></td> <!-- Display price in pounds -->
                                <td><?= esc($item['quantity']) ?></td>
                                <td>£ <?= esc($itemTotal) ?></td> <!-- Display item total in pounds -->
                                


                                <td>
                                    <a href="<?= site_url('product/removeFromCart/' . $item['id']) ?>" class="btn btn-danger">Remove</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4"></td>
                            <td><strong>Total:</strong></td>
                            <td>£ <?= esc($total) ?></td> <!-- Display total price in pounds -->
                        </tr>
                    </tbody>
                </table>
                <a href="<?= site_url('checkout') ?>" class="btn btn-success">Checkout</a>
            <?php endif; ?>
        </div>
    </section>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-ugUosv+oApzCwBqy4lBW+J/MAFjNzKRdOyUAMb8tZqXlH/3En4i+6ipFsyuiPkkD"
        crossorigin="anonymous"></script>
</body>
</html>
