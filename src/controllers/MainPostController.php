<?php

class MainPostController
{
    public function addPost()
    {
//        var_dump($_POST);
//        die;

        require_once "models/Post.php";

        $postModel = new Post();
        $lastInsertId = $postModel->create($_POST['title'], $_POST['content']);

        // redirect to new post page
        header("Location: /post?id=" . $lastInsertId);
    }

//    public function editPost($id)
//    {
//        echo "Edit post with id $id";
//    }
//
//    public function deletePost($id)
//    {
//        echo "Delete post with id $id";
//    }
}
