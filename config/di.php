<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "request" => [
            "shared" => true,
            "callback" => function () {
                $request = new \Anax\Request\Request();
                $request->init();
                return $request;
            }
        ],
        "response" => [
            "shared" => true,
            //"callback" => "\Anax\Response\Response",
            "callback" => function () {
                $obj = new \Anax\Response\ResponseUtility();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "url" => [
            "shared" => true,
            "callback" => function () {
                $url = new \Anax\Url\Url();
                $request = $this->get("request");
                $url->setSiteUrl($request->getSiteUrl());
                $url->setBaseUrl($request->getBaseUrl());
                $url->setStaticSiteUrl($request->getSiteUrl());
                $url->setStaticBaseUrl($request->getBaseUrl());
                $url->setScriptName($request->getScriptName());
                $url->configure("url.php");
                $url->setDefaultsFromConfiguration();
                return $url;
            }
        ],
        "router" => [
            "shared" => true,
            "callback" => function () {
                $router = new \Anax\Route\Router();
                $router->setDI($this);
                $router->configure("route2.php");
                return $router;
            }
        ],
        "view" => [
            "shared" => true,
            "callback" => function () {
                $view = new \Anax\View\ViewCollection();
                $view->setDI($this);
                $view->configure("view.php");
                return $view;
            }
        ],
        "viewRenderFile" => [
            "shared" => true,
            "callback" => function () {
                $viewRender = new \Anax\View\ViewRenderFile2();
                $viewRender->setDI($this);
                return $viewRender;
            }
        ],
        "session" => [
            "shared" => true,
            "callback" => function () {
                $session = new \Anax\Session\SessionConfigurable();
                $session->configure("session.php");
                return $session;
            }
        ],
        "textfilter" => [
            "shared" => true,
            "callback" => "\Anax\TextFilter\TextFilter",
        ],

        "errorController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Page\ErrorController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "debugController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Page\DebugController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "flatFileContentController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Page\FlatFileContentController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "reportController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Nicklas\Report\ReportController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "pageRender" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Page\PageRender();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "rem" => [
            "shared" => true,
            "callback" => function () {
                $rem = new \Anax\RemServer\RemServer();
                $rem->configure("remserver.php");
                $rem->injectSession($this->get("session"));
                return $rem;
            }
        ],
        "remController" => [
            "shared" => false,
            "callback" => function () {
                $rem = new \Anax\RemServer\RemServerController();
                $rem->setDI($this);
                return $rem;
            }
        ],
        // "comment" => [
        //     "shared" => true,
        //     "callback" => function () {
        //         $comment = new \Nicklas\Comment\Comment();
        //         $comment->setDI($this);
        //         return $comment;
        //     }
        // ],
        // "commentController" => [
        //     "shared" => false,
        //     "callback" => function () {
        //         $commentController = new \Nicklas\Comment\CommentController();
        //         $commentController->setDI($this);
        //         return $commentController;
        //     }
        // ],
        // "user" => [
        //     "shared" => true,
        //     "callback" => function () {
        //         $user = new \Nicklas\Comment\User();
        //         $user->setDI($this);
        //         return $user;
        //     }
        // ],
        // "userController" => [
        //     "shared" => false,
        //     "callback" => function () {
        //         $userController = new \Nicklas\Comment\UserController();
        //         $userController->setDI($this);
        //         return $userController;
        //     }
        // ],
        // "userActionController" => [
        //     "shared" => false,
        //     "callback" => function () {
        //         $userActionController = new \Nicklas\Comment\UserActionController();
        //         $userActionController->setDI($this);
        //         return $userActionController;
        //     }
        // ],
        // "adminController" => [
        //     "shared" => false,
        //     "callback" => function () {
        //         $adminController = new \Nicklas\Comment\AdminController();
        //         $adminController->setDI($this);
        //         return $adminController;
        //     }
        // ],
        "userController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Nicklas\Comment2\User\UserController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "db" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Database\DatabaseQueryBuilder();
                $obj->configure("database.php");
                return $obj;
            }
        ],
        "bookController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Book\BookController();
                $obj->setDI($this);
                return $obj;
            }
        ],
    ],
];
