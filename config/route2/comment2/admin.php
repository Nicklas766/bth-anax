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
            "callable" => ["commentFrontController", "checkIsAdmin"]
        ],
    ]
];
