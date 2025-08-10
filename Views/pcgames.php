<html lang="en" dir="ltr">
<head> 
<meta charset="utf-8"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


 

       
        <title>GamesforYou</title>
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
    background: url('../public/images/Aliens_vs._Predator_2_Box_Cover.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
		transition: all 0.3s;
}

.section-products #product-2 .part-1::before {
    background: url('../public/images/pcgrandtheftautov.jpg') no-repeat center;
    background-size: contain;
background-repeat: no-repeat;
}

.section-products #product-3 .part-1::before {
    background: url('../public/images/pchalo2.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-4 .part-1::before {
    background: url('../public/images/pchalo1.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-5 .part-1::before {
    background: url('../public/images/pchalflife2.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-6 .part-1::before {
    background: url('../public/images/pccallofduty4.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}


.section-products #product-7 .part-1::before {
    background: url('../public/images/pccallofdutyww2.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}
.section-products #product-8 .part-1::before {
    background: url('../public/images/pcleft4dead2.jpg') no-repeat center;
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


</style>


<div class="container mt-100">
                            		

                            	
                            

  
  
<section class="section-products">
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header">
										
										<h2>PC Games</h2>
								</div>
						</div>
				</div>
				<div class="row">
						<!-- Single Product -->
						<div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-1" class="single-product">
										<div class="part-1">
												<ul>
														<li><a href="/public/product/view/31"><i class="fas fa-shopping-cart"></i></a></li>
													
													
												</ul>
										</div>
										<div class="part-2">
                                                <h3 class="product-title">Aliens Vs Predator 2 PC</h3>
												
												<h4 class="product-price">£15.00</h4>
                        <a button="submit"></a> 
								</div>
						</div>
</div> 
	
                   <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-2" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/32"><i class="fas fa-shopping-cart"></i></a></li>
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Grand Theft Auto V PC</h3> 
												<h4 class="product-price">£25.00</h4>
										</div>
								</div>
						</div>


            
            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-3" class="single-product">
										<div class="part-1">
												
												<ul>
														<li><a href="/public/product/view/33><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Halo 2 PC</h3>
												<h4 class="product-price">£15.00</h4>
										</div>
								</div>
						</div>           

            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-4" class="single-product">
										<div class="part-1">
												
												<ul>
														<li><a href="/public/product/view/34"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Halo Combat Evolved PC </h3>
												<h4 class="product-price">£15.00</h4>
										</div>
								</div>
						</div>           


            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-5" class="single-product">
										<div class="part-1">
												
												<ul>
														<li><a href="/public/product/view/35"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Half-Life 2 PC </h3>
												<h4 class="product-price">£15.00</h4>
										</div>
								</div>
						</div>           


            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-6" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/36"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Call Of Duty 4 Modern Warfare PC  </h3>
												<h4 class="product-price">£17.00</h4>
										</div>
								</div>
						</div>           


            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-7" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/37"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Call Of Duty World War 2 </h3>
												<h4 class="product-price">£20.00</h4>
										</div>
								</div>
						</div>           

            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-8" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/38"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Left 4 Dead 2</h3>
												<h4 class="product-price">£13.00</h4>
							







   

  
  

</div>
</div> 

</div>
   










 


     
     
   
    
    
    
    
    
    








