<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Articles</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Style for the card layout */
        .card-columns {
            column-count: 3;
        }

        @media (max-width: 1200px) {
            .card-columns {
                column-count: 2;
            }
        }

        @media (max-width: 768px) {
            .card-columns {
                column-count: 1;
            }
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .card img {
            object-fit: cover;
            height: 200px;
            width: 100%;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #343a40;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .card-footer {
            background-color: #fff;
            border-top: none;
            text-align: right;
            padding: 10px;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            color: #fff;
            text-decoration: none;
        }

        .btn-info:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center my-4">Blog Articles</h2>

    <div class="card-columns">
        <?php
        // Loop to generate the blog articles as cards
        for ($i = 0; $i < count($blog); $i++) {
        ?>
        <div class="card">
            <img src="<?= base_url() . $blog[$i]['blog_img'] ?>" alt="Blog Image">
            <div class="card-body">
                <h5 class="card-title"><?= $blog[$i]['blog_title'] ?></h5>
                <p class="card-text"><?= substr($blog[$i]['blog_desc'], 0, 100) ?>...</p>
            </div>
            <div class="card-footer">
                <a href="<?= base_url() . 'admin/blog/view_blog/' . $blog[$i]['blogid'] ?>" class="btn btn-info">Read More</a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
