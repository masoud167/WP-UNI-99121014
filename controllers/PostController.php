<?php
// controllers/PostController.php

require_once "../models/Post.php";

class PostController {
    public function index() {
        require_once "../views/home.php";
    }
    
    public function generateViews() {
    require_once "../models/PostView.php";
    $view = new PostView();
    $view->generateViews();
    echo "Post views generated.";
}

    public function generatePosts() {
        require_once "../models/User.php";
        $userModel = new User();
        $users = $userModel->getAll();

        $postModel = new Post();

        foreach ($users as $user) {
            $postModel->createDummyPosts($user['id'], rand(5, 7));
        }

        echo "Dummy posts created successfully.";
    }
    public function generateRelations() {
    require_once "../models/RelatedPost.php";
    $rel = new RelatedPost();
    $rel->linkRandomRelatedPosts();
    echo "Related posts created.";
}

}
