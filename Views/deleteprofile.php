<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
<form action="<?= base_url('dashboard/deleteProfile') ?>" method="post">
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your profile?')">Delete Profile</button>
</form>
