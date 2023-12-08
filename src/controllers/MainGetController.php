<?php

class MainGetController
{
    public function homepage()
    {
        require_once "models/Post.php";
        $postModel = new Post();

        $allPosts = $postModel->findAll();

        $title = "Welcome to the Homepage!";
        include "views/homepage.php";
    }

    public function addPostPage()
    {
        $title = "Add Post";
        include "views/addPost.php";
    }

    public function listPostsPage()
    {
        echo "List posts page";
    }

    public function postPage()
    {
        require_once "models/Post.php";
        $postModel = new Post();

        $id = $_GET['id'];

        $post = $postModel->find($id);
        include "views/postPage.php";
    }
}
