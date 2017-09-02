<?php
/**
 * Routes for report
 */
 return [
     "routes" => [
         [
             "info" => "Get all report pages",
             "requestMethod" => null,
             "path" => "",
             "callable" => ["reportController", "allReports"],
         ],
         [
             "info" => "Get specific report page",
             "requestMethod" => null,
             "path" => "{dataset:alphanum}",
             "callable" => ["reportController", "getReport"],
         ],
     ]
 ];
