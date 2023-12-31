<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <style>
        /* Include CSS here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        header {
            background: #50b3a2;
            color: white;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #e8491d 3px solid;
        }

        header a {
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }

        header ul {
            padding: 0;
            margin: 0;
            list-style: none;
            overflow: hidden;
        }

        header li {
            float: left;
            display: inline;
            padding: 0 20px 0 20px;
        }

        header #branding {
            float: left;
        }

        header #branding h1 {
            margin: 0;
        }

        header nav {
            float: right;
            margin-top: 10px;
        }

        header .highlight, header .current a {
            color: #e8491d;
            font-weight: bold;
        }

        header a:hover {
            color: #ffffff;
            font-weight: bold;
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <div id="branding">
            <h1><span class="highlight">Ilia Arsenev</span> Webpage</h1>
        </div>
        <nav>
            <ul>
                <li class="current"><a href="/">Home</a></li>
                <li><a href="add-post">Add Post</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <p>Welcome to our website! Enjoy your stay.</p>
    <br>
    <br>
    <h2>Our posts</h2>
    <?php
    foreach ($allPosts as $post) {
        echo "<h2>" . htmlspecialchars($post['title']) . "</h2>";
        $text = $post['text'];
        if (mb_strlen($text) > 100) {
            echo "<p>" . htmlspecialchars(mb_substr($text, 0, 100)) . "...</p>";
        } else {
            echo "<p>" . htmlspecialchars($text) . "</p>";
        }

        echo "<p>Created on " . htmlspecialchars($post['created_at']) . "</p>";
        echo "<p><a href='post?id=" . htmlspecialchars($post['id']) . "'>Read more</a></p>";
    }
    ?>
</div>
</body>
</html>
