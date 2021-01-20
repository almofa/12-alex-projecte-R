<?php

/* Default routes */
$router->get("", "DefaultController", "index");
$router->get("contact", "DefaultController", "contact");
$router->post("contact", "DefaultController", "contact");
$router->get("api/demo", "DefaultController", "demo");


/* Movies routes */

$router->get("movies", "MovieController", "index", [], "", "ROLE_USER");
$router->post("movies", "MovieController", "filter", [], "","ROLE_USER");

$router->get("movies/:id/show", "MovieController", "show",
    ["id" => "number"], "movies_show");

$router->get("movies/create", "MovieController", "create", [], "", "ROLE_USER");
$router->post("movies/create", "MovieController", "store", [],"", "ROLE_USER");

$router->get("movies/:id/edit", "MovieController", "edit", ["id" => "number"], "", "ROLE_USER");
$router->post("movies/:id/edit", "MovieController", "edit", ["id" => "number"], "", "ROLE_USER");

$router->get("movies/:id/delete", "MovieController", "delete", ["id"=>"number"], "movies_delete", "ROLE_ADMIN");
$router->post("movies/delete", "MovieController", "destroy", [],"movies_destroy", "ROLE_ADMIN");

/* Partners routes */
$router->get("partners", "PartnerController", "index", [], "partners_index", "ROLE_ADMIN");
$router->post("partners", "PartnerController", "filter", [], "partners_filter", "ROLE_ADMIN");

$router->get("partners/create", "PartnerController", "create", [], "partners_create","ROLE_ADMIN");
$router->post("partners/create", "PartnerController", "store", [], "partners_store","ROLE_ADMIN");

$router->get("partners/:id/edit", "PartnerController", "edit", ["id"=>"number"], "partners_edit","ROLE_ADMIN");
$router->post("partners/:id/edit", "PartnerController", "update", ["id"=>"number"], "partners_update","ROLE_ADMIN");

$router->get("partners/:id/delete", "PartnerController", "delete", ["id"=>"number"], "partners_delete","ROLE_ADMIN");
$router->post("partners/delete", "PartnerController", "destroy", [], "partners_destroy","ROLE_ADMIN");

$router->get("login", "AuthController", "login");
$router->post("login", "AuthController", "checkLogin");

$router->get("logout", "AuthController", "logout");
$router->post("logout", "AuthController", "checkLogin");


