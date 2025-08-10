<!DOCTYPE html>
<html>
<head>
    <title>Forums</title>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <html lang="en" dir="ltr">
<head> 
<meta charset="utf-8"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


 


</head>
<body>


<div class="container">
        <h1 class="mt-4">Forums</h1>
        
        <!-- Display each blog post -->
        <?php foreach ($posts as $post): ?>
            <div class="card mt-4">
                <div class="card-body">
                    <h2><?= $post['title'] ?></h2>
                    <p><?= $post['content'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
        </div>



    <div class="container">
  


        <h2 class="mt-4">Create New Post</h2>
        <form action="/public/forums/create" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" class="form-control" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    
