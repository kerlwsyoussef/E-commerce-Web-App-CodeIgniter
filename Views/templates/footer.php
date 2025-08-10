<html lang="en">
<head>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GAMESFORYOU</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- W3.CSS for additional styling -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

footer {
    background-color: #343a40;
    color: white;
    padding: 20px 0;
  }
  
  footer a {
    color: white;
    text-decoration: none;
  }

  footer a:hover {
    text-decoration: underline;
  }

  .footer-links, .footer-contact {
    padding: 10px 0;
  }

  .footer-links ul, .footer-contact ul {
    list-style: none;
    padding: 0;
  }

  .footer-links ul li, .footer-contact ul li {
    margin-bottom: 10px;
  }

  .footer-bottom {
    background-color: #23272b;
    color: white;
    padding: 10px 0;
    text-align: center;
  }
    
</style> 

<footer class="text-center text-lg-start bg-dark text-white">
  <!-- Section: Links  -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">GAMESFORYOU</h5>
        <p>
          Welcome to GAMESFORYOU, your ultimate destination for the latest and greatest in gaming. Explore our extensive collection of Xbox, PlayStation, and PC games, along with the best consoles on the market.
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0 footer-links">
        <h5 class="text-uppercase">Quick Links</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a href="/public/xboxgames">Xbox Games</a>
          </li>
          <li>
            <a href="/public/playstationgames">PlayStation Games</a>
          </li>
          <li>
            <a href="/public/pcgames">PC Games</a>
          </li>
          <li>
            <a href="/public/xboxconsoles">Xbox Consoles</a>
          </li>
          <li>
            <a href="/public/playstationconsoles">PlayStation Consoles</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0 footer-contact">
        <h5 class="text-uppercase">Contact Us</h5>
        <ul class="list-unstyled">
          <li>
            <a href="mailto:info@gamesforyou.com"><i class="fa fa-envelope"></i> info@gamesforyou.com</a>
          </li>
          <li>
            <a href="tel:+1234567890"><i class="fa fa-phone"></i> +123 456 7890</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-map-marker"></i> 123 Gaming Street, Game City</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Section: Links  -->

  <!-- Section: Social media -->
  <div class="footer-bottom text-center">
    <a href="#" class="text-white mr-4">
      <i class="fa fa-facebook-f"></i>
    </a>
    <a href="#" class="text-white mr-4">
      <i class="fa fa-twitter"></i>
    </a>
    <a href="#" class="text-white mr-4">
      <i class="fa fa-instagram"></i>
    </a>
    <a href="#" class="text-white mr-4">
      <i class="fa fa-linkedin"></i>
    </a>
    <p class="mb-0">&copy; 2024 GAMESFORYOU. All Rights Reserved. Created on CodeIgniter.</p>
  </div>
  <!-- Section: Social media -->
</footer>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Custom JavaScript -->
<script>
  function toggleSearchBar() {
    const searchForm = document.getElementById('searchForm');
    searchForm.classList.toggle('d-none');
    searchForm.classList.toggle('d-lg-flex');
  }

  function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
  }
</script>

</body>
</html>