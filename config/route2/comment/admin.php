<?php
/**
 * Routes for the commentController
 */
return [
    "routes" => [
        [
            "info" => "Renders page for all comments",
            "requestMethod" => null,
            "path" => null,
            "callable" => ["adminController", "controlAdmin"]
        ],
        [
            "info" => "Renders page for all comments",
            "requestMethod" => "get",
            "path" => "users",
            "callable" => ["adminController", "renderUsersPage"]
        ],
        [
            "info" => "Renders page for all comments",
            "requestMethod" => "get",
            "path" => "users/{dataset:alphanum}",
            "callable" => ["adminController", "renderUserPage"]
        ],
        [
            "info" => "Renders page for all comments",
            "requestMethod" => "post",
            "path" => "users/{dataset:alphanum}",
            "callable" => ["adminController", "updateProfile"]
        ],
        [
            "info" => "Renders page create user",
            "requestMethod" => "get",
            "path" => "create",
            "callable" => ["adminController", "renderCreatePage"]
        ],
        [
            "info" => "post for create user",
            "requestMethod" => "post",
            "path" => "create",
            "callable" => ["adminController", "createUser"]
        ],
        [
            "info" => "post for create user",
            "requestMethod" => "get",
            "path" => "user/delete/{dataset:alphanum}",
            "callable" => ["adminController", "deleteUser"]
        ],
    ]
];
