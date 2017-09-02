<?php
/**
 * Routes for the userController
 */
return [
    "routes" => [
        [
            "info" => "Renders page for login",
            "requestMethod" => "get",
            "path" => "login",
            "callable" => ["userController", "renderLogin"]
        ],
        [
            "info" => "Logins user",
            "requestMethod" => "post",
            "path" => "login",
            "callable" => ["userActionController", "login"]
        ],
        [
            "info" => "Logouts user",
            "requestMethod" => "get",
            "path" => "logout",
            "callable" => ["userActionController", "logout"]
        ],
        [
            "info" => "Renders page for create form",
            "requestMethod" => "get",
            "path" => "create",
            "callable" => ["userController", "renderCreateUser"]
        ],
        [
            "info" => "Creates a new user",
            "requestMethod" => "post",
            "path" => "create",
            "callable" => ["userActionController", "createUser"]
        ],
        // --------------------- PROFILE --------------------------------------
        [
            "info" => "Control if user is logged in",
            "requestMethod" => null,
            "path" => "profile",
            "callable" => ["userActionController", "checkLogin"]
        ],
        [
            "info" => "Render page for profile",
            "requestMethod" => "get",
            "path" => "profile",
            "callable" => ["userController", "renderProfile"]
        ],
        [
            "info" => "Render page for edit profile",
            "requestMethod" => "get",
            "path" => "profile/edit",
            "callable" => ["userController", "renderEditProfile"]
        ],
        [
            "info" => "Edit the profile",
            "requestMethod" => "post",
            "path" => "profile/edit",
            "callable" => ["userActionController", "editProfile"]
        ],
        [
            "info" => "Route for fail creation or login",
            "requestMethod" => "get",
            "path" => "fail",
            "callable" => ["userController", "renderFail"]
        ],
    ]
];
