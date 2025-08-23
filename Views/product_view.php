<html lang="en">
<head>
<meta charset="utf-8"> 
<title>Product Page</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

<!-- W3.CSS for additional styling -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

    /* Black & White Buttons */
    .btn-custom.btn-black {
        background-color: #000 !important;  /* Black background */
        color: #fff !important;             /* White text */
        border: none !important;
        min-width: 160px;                   /* Same width for buttons */
        min-height: 45px;                   /* Same height for buttons */
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 10px;
        margin-top: 10px;
    }

    .btn-custom.btn-black:hover {
        background-color: #222 !important;  /* Slightly lighter black on hover */
        color: #fff !important;             /* Keep text white on hover */
    }

    .btn-custom.btn-black i {
        color: #fff !important;             /* White icons */
        margin-right: 5px;
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
</head>
<body>

<section class="py-5">
    <div class="container">
        <div class="row gx-5">
            <!-- Product Image -->
            <aside class="col-lg-6">
                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <a data-fslightbox="mygallery" class="rounded-4" target="_blank" data-type="image"
                        href="<?= base_url('images/' . urlencode($product['image'])) ?>">
                        <img style="max-width: 100%; max-height: 70vh; margin: auto;"
                            class="rounded-4 fit img-fluid" src="<?= base_url('images/' . urlencode($product['image'])) ?>"
                            alt="<?= esc($product['productname']) ?>" />
                    </a>
                </div>
            </aside>

            <!-- Product Details -->
            <main class="col-lg-6">
                <div class="ps-lg-3">
                    <h4 class="title text-dark"><?= esc($product['productname']) ?></h4>
                    <div class="mb-3">
                        <span class="h5"><?= "£" . number_format($product['price'], 2) ?></span>
                    </div>
                    <p><?= esc($product['description']) ?></p>

                    <!-- Black & White Buttons -->
                    <button class="btn btn-custom btn-black" onclick="addToCart(<?= $product['id'] ?>)">
                        <i class="fa fa-shopping-basket"></i>Add to cart
                    </button>

                    <a href="#" class="btn btn-custom btn-black">
                        <i class="fa fa-heart fa-lg"></i>Save
                    </a>
                </div>
            </main>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
    integrity="sha384-ugUosv+oApzCwBqy4lBW+J/MAFjNzKRdOyUAMb8tZqXlH/3En4i+6ipFsyuiPkkD" crossorigin="anonymous">
</script>

<script>
function addToCart(productId) {
    $.post('<?= site_url('product/addToCart') ?>/' + productId, function (data) {
        // Optionally, handle response here
    });
}
</script>

</body>
</html>
