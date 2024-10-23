<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .blog-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .blog-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 15px;
        }

        .blog-meta {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .blog-content {
            font-size: 1.2rem;
            color: #495057;
            line-height: 1.7;
        }

        .back-btn {
            margin-top: 20px;
        }

        .btn-back {
            background-color: #17a2b8;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            color: #fff;
            text-decoration: none;
        }

        .btn-back:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <!-- <a href="<?= base_url() . 'admin/blog' ?>" class="btn-back mb-4">← Back to Blog</a> -->
        <!-- <?php echo '<pre>';
        print_r($blog);?> -->
    <div class="row">
        <div class="col-md-12">
            <img src="<?= base_url() . $blog[0]['blog_img'] ?>" alt="Blog Image" class="blog-image" style="width: 500px; height: 500px;">
        </div>

        <div class="col-md-12">
            <h1 class="blog-title"><?= $blog[0]['blog_title'] ?></h1>
            <p class="blog-meta">Published on <?= date('F j, Y', strtotime($blog[0]['created_on'])) ?></p>
            <div class="blog-content">
                <p><?= nl2br($blog[0]['blog_desc']) ?></p>
            </div>
        </div>
    </div>

    <div class="back-btn">
        <a href="<?= base_url() . 'home' ?>" class="btn-back">← Back to Blog</a>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
