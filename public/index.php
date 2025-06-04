<?php
// public/index.php

require_once "../config/database.php";
require_once "../models/Post.php";
require_once "../controllers/PostController.php";
require_once "../controllers/UserController.php";

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'register':
        $userController = new UserController();
        $userController->register();
        break;
    
    case 'users':
    $userController = new UserController();
    $userController->list();
    break;

    case 'generate_posts':
    $postController = new PostController();
    $postController->generatePosts();
    break;

    case 'generate_relations':
    $postController = new PostController();
    $postController->generateRelations();
    break;
    
    case 'generate_views':
    $postController = new PostController();
    $postController->generateViews();
    break;
    
    case 'rank_posts':
    require_once "../controllers/RankingController.php";
    $ranking = new RankingController();
    $ranking->rankPosts();
    break;


    case 'home':
    default:
        $postController = new PostController();
        $postController->index();
        break;
    
}
