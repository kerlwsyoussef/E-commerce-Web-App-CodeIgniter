<html lang="en">
<head>
<meta charset="utf-8"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



<body>
<style> 


        h1 {
            text-align: center;
        }

        .fit {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .card-title,
        .card-text {
            margin: 0;
        }

        .card-price {
            font-size: 1.25rem;
            font-weight: bold;
            color: #007bff;
        }

        .btn-custom {
            margin-top: 10px;
        }
h1 {
  text-align: center;
}

        .similar-items .card-title, 
        .similar-items .card-price, 
        .similar-items .btn {
            color: black;
        }
        .similar-items .btn {
            border-color: black;
        }

</style> 
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygallery" class="rounded-4" target="_blank" data-type="image"
                            href="<?= base_url('images/' . urlencode($product['image'])) ?>">
                            <img style="max-width: 100%; max-height: 70vh; margin: auto;"
                                class="rounded-4 fit img-fluid" src="<?= base_url('images/' . urlencode($product['image'])) ?>"
                                alt="<?= esc($product['productname']) ?>" />
                        </a>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <!-- Thumbnails or additional images can go here -->
                    </div>
                </aside>
                <main class="col-lg-6">
    <div class="ps-lg-3">
        <h4 class="title text-dark">
            <?= esc($product['productname']) ?>
        </h4>
        <div class="mb-3">
            <span class="h5"><?= "£" . number_format($product['price'], 2) ?></span>
            <!-- Displaying price with £ symbol -->
            <span class="text-muted"></span>
        </div>
        <p><?= esc($product['description']) ?></p>
        <!-- Buy Now, Add to Cart, and Save buttons -->
        <a href="" class="btn btn-warning shadow-0">Buy now</a>
        <button class="btn btn-primary shadow-0" onclick="addToCart(<?= $product['id'] ?>)">
            <i class="me-1 fa fa-shopping-basket"></i>Add to cart
        </button>
        <a href="<?= site_url('product/viewCart') ?>" class="btn btn-primary">View Cart</a> <!-- Link to view cart -->
        <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"><i
                class="me-1 fa fa-heart fa-lg"></i>Save</a>
    </div>
</main>

            </div>
        </div>
    </section>
  
                      
              
   

            <!-- Similar Items Section (Right Side) -->
            <div class="col-lg-4">
                <div class="similar-items">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Similar items</h5>
                            <?php foreach ($similarItems as $item) : ?>
                                <div class="card mb-3">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-md-4 col-lg-12 mb-3 mb-md-0">
                                            <a href="<?= site_url('product/view/' . $item['id']) ?>">
                                                <img src="<?= base_url('images/' . urlencode($item['image'])) ?>"
                                                     class="img-fluid img-thumbnail"
                                                     alt="<?= esc($item['productname']) ?>" />
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-8 col-lg-12">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= esc($item['productname']) ?></h5>
                                                <p class="card-price"><?= "£" . number_format($item['price'], 2) ?></p>
                                                <a href="<?= site_url('product/view/' . $item['id']) ?>"
                                                   class="btn btn-outline-primary btn-sm">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-ugUosv+oApzCwBqy4lBW+J/MAFjNzKRdOyUAMb8tZqXlH/3En4i+6ipFsyuiPkkD" crossorigin="anonymous">
    </script>
    <script>
        function addToCart(productId) {
            $.post('<?= site_url('product/addToCart') ?>/' + productId, function (data) {
                alert('Product added to cart!');
            });
        }
    </script>
</body>

</html>