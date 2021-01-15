<?php

/* Default routes */
$router->get("", "DefaultController", "index");
$router->get("contact", "DefaultController", "contact");
$router->post("contact", "DefaultController", "contact");
$router->get("api/demo", "DefaultController", "demo");


/* Movies routes */

$router->get("movies", "MovieController", "index");
$router->post("movies", "MovieController", "filter");

$router->get("movies/:id/show", "MovieController", "show",
    ["id" => "number"], "movies_show");

$router->get("movies/create", "MovieController", "create");
$router->post("movies/create", "MovieController", "store");

$router->get("movies/:id/edit", "MovieController", "edit", ["id" => "number"]);
$router->post("movies/:id/edit", "MovieController", "edit", ["id" => "number"]);

$router->get("movies/:id/delete", "MovieController", "delete", ["id"=>"number"], "movies_delete");
$router->post("movies/delete", "MovieController", "destroy", [],"movies_destroy");

/* Partners routes */
$router->get("partners", "PartnerController", "index", [], "partners_index");
$router->post("partners", "PartnerController", "filter", [], "partners_filter");

$router->get("partners/create", "PartnerController", "create", [], "partners_create");
$router->post("partners/create", "PartnerController", "store", [], "partners_store");

$router->get("partners/:id/edit", "PartnerController", "edit", ["id"=>"number"], "partners_edit");
$router->post("partners/:id/edit", "PartnerController", "update", ["id"=>"number"], "partners_update");

$router->get("partners/:id/delete", "PartnerController", "delete", ["id"=>"number"], "partners_delete");
$router->post("partners/delete", "PartnerController", "destroy", [], "partners_destroy");

$router->get("login", "AuthController", "login");
$router->post("login", "AuthController", "checkLogin");

$router->get("logout", "AuthController", "logout");
$router->post("logout", "AuthController", "checkLogin");


