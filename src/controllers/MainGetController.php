<?php

class MainGetController
{
    public function homepage()
    {
        $title = "Welcome to the Homepage!";
        include "views/homepage.php";
    }

    public function addPostPage()
    {
        echo "Add post page";
    }

    public function listPostsPage()
    {
        echo "List posts page";
    }

    public function postPage($id)
    {
        echo "Post page with id $id";
    }
}
