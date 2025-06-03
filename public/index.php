<?php
// public/index.php

// Load the database connection
require_once "../config/database.php";

// Load model and controller (we'll create these files soon)
require_once "../models/Post.php";
require_once "../controllers/PostController.php";

// Instantiate the controller
$controller = new PostController();
$controller->index();
