<?php
/**
 * Configuration file for routes.
 */
return [
    // Load these routefiles in order specified and optionally mount them
    // onto a base route.
    "routeFiles" => [
        [
            // These are for internal error handling and exceptions
            "mount" => null,
            "file" => __DIR__ . "/route2/internal.php",
        ],
        [
            // For debugging and development details on Anax
            "mount" => "debug",
            "file" => __DIR__ . "/route2/debug.php",
        ],
        [
            // Routers for the REM server mounts on api/
            "mount" => "remserver/api",
            "file" => __DIR__ . "/route2/remserver.php",
        ],
        [
            // Routers for the user parts mounts on user/
            "mount" => "user",
            "file" => __DIR__ . "/route2/comment/user.php",
        ],
        [
            // Routers for the user parts mounts on comment/
            "mount" => "comment",
            "file" => __DIR__ . "/route2/comment/comment.php",
        ],
        [
            // Routers for the user parts mounts on admin/
            "mount" => "admin",
            "file" => __DIR__ . "/route2/comment/admin.php",
        ],
        [
            // Routers for the reports
            "mount" => "report",
            "file" => __DIR__ . "/route2/report.php",
        ],
        [
            // Add routes from bookController and mount on book/
            "mount" => "book",
            "file" => __DIR__ . "/route2/bookController.php",
        ],
        [
            // To read flat file content in Markdown from content/
            "mount" => null,
            "file" => __DIR__ . "/route2/flat-file-content.php",
        ],
        [
            // Keep this last since its a catch all
            "mount" => null,
            "file" => __DIR__ . "/route2/404.php",
        ],
    ],

];
