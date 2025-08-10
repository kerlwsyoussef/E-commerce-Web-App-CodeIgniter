<html lang="en">
<head>
<meta charset="utf-8"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Include Font Awesome CSS -->




        
        <title>GamesforYou</title>
 

<Style> 

  
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
    height: 320px;
    max-height: 320px;
    margin-bottom: 20px;
    overflow: hidden;
}

.section-products .single-product .part-1::before {
		position: absolute;
		content: "";
		top: 0;
		left: 0;
		width: 50%;
		height: 50%;
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
}
.section-products #product-3 .part-1::before {
    background: url('../public/images/streetfighter6.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-2 .part-1::before {
    background: url('../public/images/HaloMasterCollection.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-4 .part-1::before {
    background: url('../public/images/gta5.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-5 .part-1::before {
    background: url('../public/images/destiny2.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-6 .part-1::before {
    background: url('../public/images/reddeadredemption2.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}


.section-products #product-7 .part-1::before {
    background: url('../public/images/avp.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}
.section-products #product-8 .part-1::before {
    background: url('../public/images/GodOfWar.jpg') no-repeat center;
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

.section-products .single-product:hover .part-1::before {
		transform: scale(1.2,1.2) rotate(5deg);
}

.section-products #product-9 .part-1::before {
    background: url('../public/images/xboxseriesx.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
		transition: all 0.3s;
}

.section-products #product-10 .part-1::before {
    background: url('../public/images/xboxseriess.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-11 .part-1::before {
    background: url('../public/images/playstation5digitaledition.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-12 .part-1::before {
    background: url('../public/images/playstation5standardedition.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-13 .part-1::before {
    background: url('../public/images/playstation4.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-products #product-14 .part-1::before {
    background: url('../public/images/xboxone.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}


.section-products #product-15 .part-1::before {
    background: url('../public/images/playstation2.jpg') no-repeat center;
    background-size: contain;
    background-repeat: no-repeat;
}
.section-products #product-16 .part-1::before {
    background: url('../public/images/playstation3slim.jpg') no-repeat center;
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
	.slider {
  width: 100%;
  height: 510px;
  position: relative;
}

.slider img {
  width: 100%;
  height: 500px;
  position: absolute;
  
}

.slider img:first-child {
  z-index: 1;
  
}

.slider img:nth-child(2) {
  z-index: 0;
}

  .navigation-button {
  text-align: center;
  position: relative;
}

.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
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
                 <div class="card mb-30"><a class="card-img-tiles" href="/public/xboxconsoles" data-abc="true">
                     <div class="inner">
                       <div class="main-img"><img src="../public/images/xboxseriesx.jpg" alt="Category"></div>
                      
                     </div></a>
                   <div class="card-body text-center">
                     <h4 class="card-title">Xbox Consoles</h4>
                     <p class="text-muted">Starting from £245</p><a class="btn btn-outline-primary btn-sm" href="/public/xboxconsoles" data-abc="true">View Products</a>
                   </div>
                 </div>
               </div>
               <div class="col-md-4 col-sm-6">
                 <div class="card mb-30"><a class="card-img-tiles" href="/public/playstationconsoles" data-abc="true">
                     <div class="inner">
                       <div class="main-img"><img src="../public/images/playstation5standardedition.jpg" alt="Category"></div>
                      
                     </div></a>
                   <div class="card-body text-center">
                     <h4 class="card-title">Playstation Consoles</h4>
                     <p class="text-muted">Starting from £345</p><a class="btn btn-outline-primary btn-sm" href="/public/playstationconsoles" data-abc="true">View Products</a>
                     
                 </div>
                 </div>
               </div>
               <div class="col-md-4 col-sm-6">
                 <div class="card mb-30"><a class="card-img-tiles" href="/public/switchconsoles" data-abc="true">
                     <div class="inner">
                       <div class="main-img"><img src="../public/images/switchlite.jpg" alt="Category"></div>
                       
                     </div></a>
                   <div class="card-body text-center">
                     <h4 class="card-title">Switch Consoles</h4>
                     <p class="text-muted">Starting from £199</p><a class="btn btn-outline-primary btn-sm" href="/public/switchconsoles" data-abc="true">View Products</a>
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
										
										<h2>Featured Consoles</h2>
								</div>
						</div>
				</div>
				<div class="row">
						<!-- Single Product -->
					
	
                   <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-10" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/10"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Xbox Series S</h3> 
												<h4 class="product-price">£249</h4>
										</div>
								</div>
						</div>


            
         
								          

            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-12" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/11"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">PlayStation 5 Standard Edition </h3>
												<h4 class="product-price">£299</h4>
										</div>
								</div>
						</div>           


            <div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-13" class="single-product">
										<div class="part-1">
												<span class="discount">15% off</span>
												<ul>
														<li><a href="/public/product/view/12"><i class="fas fa-shopping-cart"></i></a></li>
														
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title">Playstation 4 Slim Edition </h3>
												<h4 class="product-price">£149</h4>
										</div>
								</div>
						</div>           


          






   

  
  

</div>
</div> 

</div>
   










 


     