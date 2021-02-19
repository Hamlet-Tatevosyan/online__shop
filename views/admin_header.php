<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Update</title>
    <meta charset="utf-8">
    <link rel="icon" href="../../template/favicon/admin.png" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../template/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../template/font/css/fontawesome.css" rel="stylesheet">
    <link href="../../template/font/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../template/css/style.css">
</head>
<body style="background: black">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <i class="fas fa-user-lock"></i>
    <a class="navbar-brand ml-2" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="/admin">Administrator panel <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
    <a href="/">
        <button class="btn btn-outline-info my-2 my-sm-0 mr-sm-2 ml-2" type="button" name="logout">Site</button>
    </a>
    <a href="/user/logout">
        <button class="btn btn-outline-info my-2 my-sm-0 mr-sm-2 ml-2" type="button" name="logout">Logout</button>
    </a>
</nav>