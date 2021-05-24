<?php
/* crack fiera*/
/* Default routes */
$router->get("", "DefaultController", "index");
$router->get("contact", "DefaultController", "contact");
$router->post("contact", "DefaultController", "contact");
$router->get("sobre", "DefaultController", "sobre");
$router->get("localitzacio", "DefaultController", "local");
$router->get("pregfrequents", "DefaultController", "preguntes");
$router->get("tenda", "DefaultController", "tenda");
$router->get("api/demo", "DefaultController", "demo");
$router->get("users","DefaultController", "users", [], "", "ROLE_ADMIN" );



/*Users routes */
$router->get("users", "UserController", "index", [], "users_index", "ROLE_ADMIN");
$router->get("perfil", "UserController", "show", [], "users_show", "ROLE_USER" );

$router->get("perfil/:id/editpass", "UserController", "edit", ["id" => "number"],"users_edit", "ROLE_USER");
$router->post("perfil/:id/editpass", "UserController", "update", ["id" => "number"], "users_update", "ROLE_USER");

/*Products routes*/
$router->get("products", "ProductController", "index", [], "products_index", "ROLE_ADMIN");
$router->post("products", "ProductController", "filter", [], "products_filter", "ROLE_ADMIN");

$router->get("products/create", "ProductController", "create", [], "products_create","ROLE_ADMIN");
$router->post("products/create", "ProductController", "store", [], "products_store","ROLE_ADMIN");

$router->get("products/:id/edit", "ProductController", "edit", ["id"=>"number"], "products_edit","ROLE_ADMIN");
$router->post("products/:id/edit", "ProductController", "update", ["id"=>"number"], "products_update","ROLE_ADMIN");

$router->get("products/:id/delete", "ProductController", "delete", ["id"=>"number"], "products_delete","ROLE_ADMIN");
$router->post("products/delete", "ProductController", "destroy", [], "products_destroy","ROLE_ADMIN");

$router->get("products/:id/show", "ProductController", "show",
    ["id" => "number"], "products_show");


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

$router->get("register", "AuthController", "register");
$router->post("register", "AuthController", "register");
