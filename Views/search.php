<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <script>
        $(document).ready(function(){
            $('#searchForm').submit(function(e){
                e.preventDefault();
                var keyword = $('#keyword').val();
                $.ajax({
                    url: "<?php echo base_url('search/search'); ?>",
                    type: 'post',
                    data: {keyword: keyword},
                    dataType: 'json',
                    success:function(response){
                        // Redirect to product view page for each product in the search results
                        $.each(response.results, function(index, product) {
                            window.location.href = "<?php echo base_url('product/view'); ?>/" + product.id;
                        });
                    }
                });
            });
        });
    </script>
</head>
<body>
    
    <form id="searchForm">
        <input type="text" id="keyword" name="keyword" placeholder="Enter keyword">
        <button type="submit">Search</button>
    </form>
</body>
</html>
