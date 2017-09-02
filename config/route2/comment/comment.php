<?php
/**
 * Routes for the commentController
 */
return [
    "routes" => [
        [
            "info" => "Renders page for all comments",
            "requestMethod" => null,
            "path" => "",
            "callable" => ["commentController", "renderComments"]
        ],
        [
            "info" => "Creates a new comment",
            "requestMethod" => "post",
            "path" => "create",
            "callable" => ["commentController", "postComment"]
        ],
        [
            "info" => "Control if user is allowed to edit comment",
            "requestMethod" => null,
            "path" => "*/{id:digit}",
            "callable" => ["commentController", "controlUser"]
        ],
        [
            "info" => "Renders page for specific comment",
            "requestMethod" => "get",
            "path" => "edit/{id:digit}",
            "callable" => ["commentController", "renderComment"]
        ],
        [
            "info" => "Updates the comment",
            "requestMethod" => "post",
            "path" => "update/{id:digit}",
            "callable" => ["commentController", "updateComment"]
        ],
        [
            "info" => "Deletes the comment",
            "requestMethod" => "get",
            "path" => "delete/{id:digit}",
            "callable" => ["commentController", "deleteComment"]
        ],
    ]
];
