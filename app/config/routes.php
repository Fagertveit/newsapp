<?php
# Here we setup the valid routes for the application, when the router is run it will use this list to match the current request
# with method and url

use Newsapp\Core\RouteManager;

# Main interface routes
RouteManager::get("/", "Newsapp\Controller\MainController", "listArticles");
RouteManager::get("/article/:id", "Newsapp\Controller\MainController", "readArticle");
RouteManager::get("/article/:id/edit", "Newsapp\Controller\MainController", "editArticle");
RouteManager::get("/article/create", "Newsapp\Controller\MainController", "createArticle");
RouteManager::get("/login", "Newsapp\Controller\MainController", "showLogin");
RouteManager::post("/login", "Newsapp\Controller\MainController", "loginUser");
RouteManager::get("/logout", "Newsapp\Controller\MainController", "logout");

# API routes
RouteManager::get("/api/articles", "Newsapp\Controller\ApiController", "listArticles");
RouteManager::post("/api/article", "Newsapp\Controller\ApiController", "createArticle");
RouteManager::get("/api/article/:id", "Newsapp\Controller\ApiController", "readArticle");
RouteManager::post("/api/article/:id/update", "Newsapp\Controller\ApiController", "updateArticle");
RouteManager::post("/api/article/:id/delete", "Newsapp\Controller\ApiController", "deleteArticle");
