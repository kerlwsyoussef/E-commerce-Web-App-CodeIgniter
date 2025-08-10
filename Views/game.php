<html lang="en">
<head>
<meta charset="utf-8"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



  </head>
<body>
   
</head>

<style> 
        h1 {
  text-align: center;
}

p {
    font-size: 12px;
}

a,
a:hover {
    text-decoration: none;
    color: inherit;
}

.section-products {
    padding: 80px 0 54px;
}

.section-products .header {
    margin-bottom: 50px;
}

.section-products .header h3 {
    font-size: 1rem;
    color: #fe302f;
    font-weight: 500;
}

.section-products .header h2 {
    font-size: 2.2rem;
    font-weight: 400;
    color: #444444; 
}

.section-products .single-product {
    margin-bottom: 26px;
}

.section-products .single-product .part-1 {
    position: relative;
    height: 290px;
    max-height: 290px;
    margin-bottom: 20px;
    overflow: hidden;
}

.section-products .single-product .part-1::before {
		position: absolute;
		content: "";
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: -1;
		transition: all 0.3s;
}
@media only screen and (max-width: 600px) {
 
  .section-products {
    padding: 50px 0 34px;
  }
  
  .section-products .header h2 {
    font-size: 1.8rem; 
  }

  .single-product {
    margin-bottom: 20px; 
  }

  .product-title {
    font-size: 0.9rem;
  }

  .product-price,
  .product-old-price {
    font-size: 0.9rem;
  }


  .section-products .single-product .part-1 {
    height: 200px; 
    max-height: 200px; 
  }


  .section-products .single-product .part-1 ul li a {
    width: 30px;
    height: 30px;
    line-height: 30px;
  }
}
.section-products .single-product:hover .part-1::before {
		transform: scale(1.2,1.2) rotate(5deg);
}

.section-products #product-1 .part-1::before {
    background: url('../public/images/CallOfDutyModernWarfare2.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
		transition: all 0.3s;
}

.section-products #product-2 .part-1::before {
    background: url('../public/images/HaloMasterCollection.jpg') no-repeat center;
    background-size: contain;
background-repeat: no-repeat;
}

.section-products #product-3 .part-1::before {
    background: url('../public/images/streetfighter6xbox.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-4 .part-1::before {
    background: url('../public/images/grandtheftautovxboxseriesx.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-5 .part-1::before {
    background: url('../public/images/destiny2.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-6 .part-1::before {
    background: url('../public/images/reddeadredepemption2.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}


.section-products #product-7 .part-1::before {
    background: url('../public/images/avp.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}
.section-products #product-8 .part-1::before {
    background: url('../public/images/ps5godofwaragnarok.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}
.section-products .single-product .part-1 .discount,
.section-products .single-product .part-1 .new {
    position: absolute;
    top: 15px;
    left: 20px;
    color: #ffffff;
    background-color: #fe302f;
    padding: 2px 8px;
    text-transform: uppercase;
    font-size: 0.85rem;
}

.section-products .single-product .part-1 .new {
    left: 0;
    background-color: #444444;
}

.section-products .single-product .part-1 ul {
    position: absolute;
    bottom: -41px;
    left: 20px;
    margin: 0;
    padding: 0;
    list-style: none;
    opacity: 0;
    transition: bottom 0.5s, opacity 0.5s;
}

.section-products .single-product:hover .part-1 ul {
    bottom: 30px;
    opacity: 1;
}

.section-products .single-product .part-1 ul li {
    display: inline-block;
    margin-right: 4px;
}

.section-products .single-product .part-1 ul li a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    background-color: #ffffff;
    color: #444444;
    text-align: center;
    box-shadow: 0 2px 20px rgb(50 50 50 / 10%);
    transition: color 0.2s;
}

.section-products .single-product .part-1 ul li a:hover {
    color: #fe302f;
}

.section-products .single-product .part-2 .product-title {
    font-size: 1rem;
}

.section-products .single-product .part-2 h4 {
    display: inline-block;
    font-size: 1rem;
}

.section-products .single-product .part-2 .product-old-price {
    position: relative;
    padding: 0 7px;
    margin-right: 2px;
    opacity: 0.6;
}

.section-products .single-product .part-2 .product-old-price::after {
    position: absolute;
    content: "";
    top: 50%;
    left: 0;
    width: 100%;
    height: 1px;
    background-color: #444444;
    transform: translateY(-50%);
}

img {
  width: 100%;
  height: auto;
}

body {
  
}
                                	.mt-100{
                                		margin-top: 100px;
                                	}
                                	.card {
    border-radius: 7px !important;
    border-color: #e1e7ec;
}

.mb-30 {
    margin-bottom: 30px !important;
}

.card-img-tiles {
    display: block;
    border-bottom: 1px solid #e1e7ec;
}

a {
    color: #0da9ef;
    text-decoration: none !important;
}

.card-img-tiles>.inner {
    display: table;
    width: 100%;
}

.card-img-tiles .main-img, .card-img-tiles .thumblist {
    display: table-cell;
    width: 65%;
    padding: 15px;
    vertical-align: middle;
}

.card-img-tiles .main-img>img:last-child, .card-img-tiles .thumblist>img:last-child {
    margin-bottom: 0;
}

.card-img-tiles .main-img>img, .card-img-tiles .thumblist>img {
    display: block;
    width: 100%;
    margin-bottom: 6px;
}
.thumblist {
    width: 35%;
    border-left: 1px solid #e1e7ec !important;
    display: table-cell;
    width: 65%;
    padding: 15px;
    vertical-align: middle;
}



.card-img-tiles .thumblist>img {
    display: block;
    width: 100%;
    margin-bottom: 6px;
}
.btn-group-sm>.btn, .btn-sm {
    padding: .45rem .5rem !important;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
}
 
</style>


<div class="container mt-100">
                            		

                            	
                               
                               <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="card mb-30"><a class="card-img-tiles" href="/public/xboxgames" data-abc="true">
                <div class="inner">
                  <div class="main-img"><img src="../public/images/haloinfinitexbox.jpg" alt="Category"></div>
                 
                </div></a>
              <div class="card-body text-center">
                <h4 class="card-title">Xbox Games</h4>
                <p class="text-muted">Starting from £9.99</p><a class="btn btn-outline-primary btn-sm" href="/public/xboxgames" data-abc="true">View Products</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="card mb-30"><a class="card-img-tiles" href="/public/playstationgames" data-abc="true">
                <div class="inner">
                  <div class="main-img"><img src="../public/images/reddeadredepemption2.jpg" alt="Category"></div>
                 
                </div></a>
              <div class="card-body text-center">
                <h4 class="card-title">Playstation Games</h4>
                <p class="text-muted">Starting from £15.99</p><a class="btn btn-outline-primary btn-sm" href="/public/playstationgames" data-abc="true">View Products</a>
                
			</div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="card mb-30"><a class="card-img-tiles" href="/public/pcgames" data-abc="true">
                <div class="inner">
                  <div class="main-img"><img src="../public/images/Aliens_vs._Predator_2_Box_Cover.jpg" alt="Category"></div>
                  
                </div></a>
              <div class="card-body text-center">
                <h4 class="card-title">PC Games</h4>
                <p class="text-muted">Starting from £9.99</p><a class="btn btn-outline-primary btn-sm" href="/public/pcgames" data-abc="true">View Products</a>
              </div>
            </div>
          </div>
        </div>
        </div>


  
  
<section class="section-products">
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header">
										
										<h2>Featured Games</h2>
								</div>
						</div>
				</div>
				<div class="row">
						<!-- Single Product -->
						<div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-1" class="single-product">
										<div class="part-1">
												<ul>
														<li><a href="/public/product/view/1"><i class="fas fa-shopping-cart"></i></a></li>
													
													
												</ul>
										</div>
										<div class="part-2">
                                                <h3 class="product-title">Call Of Duty: Modern Warfare 2</h3>
												<h4 class="product-old-price">£45.00</h4>
												<h4 class="product-price">£35.00</h4>
                        <a button="submit"></a> 
								</div>
						</div>
</div> 
	
                   <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-2" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/2"><i class="fas fa-shopping-cart"></i></a></li>
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Halo Master Chief Collection</h3> 
												<h4 class="product-price">£30.00</h4>
										</div>
								</div>
						</div>


            
            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-3" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/3><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Street Figher 6</h3>
												<h4 class="product-price">£26.00</h4>
										</div>
								</div>
						</div>           

            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-4" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/4"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Grand Theft Auto V </h3>
												<h4 class="product-price">£30.00</h4>
										</div>
								</div>
						</div>           


            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-5" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/5"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Destiny 1 </h3>
												<h4 class="product-price">£20.00</h4>
										</div>
								</div>
						</div>           


            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-6" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/6"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Red Dead Redemption 2 </h3>
												<h4 class="product-price">£35.00</h4>
										</div>
								</div>
						</div>           


            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-7" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/7"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Aliens Vs Predator 2010</h3>
												<h4 class="product-price">£10.00</h4>
										</div>
								</div>
						</div>           

            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-8" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/24"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">God Of War Remastered  </h3>
												<h4 class="product-price">£30.00</h4>
							







   

  
  

</div>
</div> 

</div>
   






<script>
    // Function to handle AJAX request for fetching product details
    function getProductDetails(productId) {
        // Send an AJAX request to fetch product details
        $.ajax({
            url: '/public/product/view/' + productId,
            type: 'GET',
            success: function(response) {
                // Update the product details section with the fetched data
                $('#product-details').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>


 


     
     
   
    
    
    
    
    
    








