<!DOCTYPE html>
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

<!-- Custom CSS -->
<style>
  .sidebar {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #f8f9fa;
    overflow-x: hidden;
    transition: 0.3s;
    padding-top: 60px;
  }

  .sidebar a {
    padding: 10px 15px;
    text-decoration: none;
    font-size: 25px;
    color: #000; /* Change sidebar text to black */
    display: block;
    transition: 0.3s;
  }

  .sidebar a:hover {
    color: #007bff;
  }

  .sidebar .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
  }

  .navbar {
  display: flex;
  justify-content: space-between;
}

#searchForm {
    flex-grow: 1;
  }

  .input-group {
    display: flex;
    width: 100%;
  }

  #keyword {
    flex-grow: 1;
    min-width: 0; /* Ensures the input doesn't overflow its container */
  }

  .input-group-append {
    display: flex;
  }

  /* Suggestions box styles */
  #suggestions {
    position: absolute;
    width: 100%;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    max-height: 300px; /* Limit height if needed */
    overflow-y: auto;
    border: 1px solid rgba(0,0,0,.15);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
    background-color: #fff; /* Set background color */
    padding: 5px; /* Add padding */
  }

  .list-group-item-action {
    cursor: pointer;
  }

  .list-group-item-action:hover {
    background-color: #f8f9fa;
  }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
  <a class="navbar-brand" href="/public">GAMESFORYOU</a>

  <form id="searchForm" class="form-inline my-2 my-lg-0 mr-auto d-none d-lg-flex position-relative" style="flex-grow: 1;">
    <div class="input-group" style="width: 90%;">
      <input id="keyword" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="flex-grow: 1;">
      <div class="input-group-append">
        <button id="searchBtn" class="btn btn-outline-light" type="button"><i class="fa fa-search"></i></button>
      </div>
    </div>
    <div id="suggestions" class="list-group position-absolute w-100" style="z-index: 1000;"></div>
  </form>
 

  <ul>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('keyword');
    const suggestionsBox = document.getElementById('suggestions');

    searchInput.addEventListener('input', function() {
        const keyword = searchInput.value.trim();

        if (keyword.length > 0) {
            fetch(`<?= base_url('search/suggestions') ?>`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ keyword: keyword })
            })
            .then(response => response.json())
            .then(data => {
                suggestionsBox.innerHTML = '';
                if (data.length > 0) {
                    data.forEach(item => {
                        const suggestionItem = document.createElement('a');
                        suggestionItem.classList.add('list-group-item', 'list-group-item-action');
                        suggestionItem.textContent = item.productname;
                        suggestionItem.href = `<?= base_url('product') ?>/${item.id}`;
                        suggestionsBox.appendChild(suggestionItem);
                    });
                
                }
                suggestionsBox.style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
        } else {
            suggestionsBox.style.display = 'none';
        }
    });

    document.addEventListener('click', function(event) {
        if (!searchInput.contains(event.target) && !suggestionsBox.contains(event.target)) {
            suggestionsBox.style.display = 'none';
        }
    });
});
</script>

  <div class="d-flex align-items-center">
    <a href="/public/register" class="d-inline-block mr-3">
      <i class="fa fa-user d-none d-lg-inline" style="font-size:36px; color:white;"></i>
      <i class="fa fa-user d-inline d-lg-none" style="font-size:24px; color:white;"></i>
    </a>
    <a href="/public/product/viewCart" class="d-inline-block mr-3">
      <i class="fa fa-shopping-basket d-none d-lg-inline" style="font-size:36px; color:white;"></i>
      <i class="fa fa-shopping-basket d-inline d-lg-none" style="font-size:24px; color:white;"></i>
    </a>
    <a id="searchIcon" href="javascript:void(0);" class="d-inline-block d-lg-none" onclick="toggleSearchBar()">
      <i class="fa fa-search" style="font-size:24px; color:white;"></i>
    </a>
  </div>
</nav>


<!-- Main content with Bootstrap's navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="openbtn" onclick="openNav()">☰</button> 
  <span class="navbar-brand d-lg-none"><b>Menu</b></span> 
  <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/public/xboxgames"><b>XBOX GAMES</b></a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/public/playstationgames"><b>PLAYSTATION GAMES</b></a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/public/pcgames"><b>PC GAMES</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/public/xboxconsoles"><b>XBOX CONSOLES</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/public/playstationconsoles"><b>PLAYSTATION CONSOLES</b></a>
      </li>
      <?php if (session()->get('isLoggedIn')): ?>
        <li class="nav-item">
          <a class="nav-link" href="/public/forums"><b>SWITCH CONSOLES</b></a>
        </li>
      <?php endif; ?>
      <?php if (session()->get('isLoggedIn')): ?>
        <li class="nav-item">
          <a class="nav-link" href="/public/dashboard"><b>My Account</b></a>
        </li> 
      <?php endif; ?>
    </ul>
  </div>
</nav>

<!-- Side Navigation -->
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a class="nav-link" href="/public/home">GAMESFORYOU</a>
  <a class="nav-link" href="/public/xboxgames">XBOX GAMES</a>
  <a class="nav-link" href="/public/playstationgames">PLAYSTATION GAMES</a>
  <a class="nav-link" href="/public/pcgames">PC GAMES</a>
  <a class="nav-link" href="/public/playstationconsoles">PLAYSTATION CONSOLES</a>
  <a class="nav-link" href="/public/xboxconsoles">XBOX CONSOLES</a>
  <?php if (session()->get('isLoggedIn')): ?>
    <a class="nav-link" href="/public/forums">Forums</a>
  <?php endif; ?>
  <?php if (session()->get('isLoggedIn')): ?>
    <a class="nav-link" href="/public/dashboard">My Account</a>
  <?php endif; ?>
</div>

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
