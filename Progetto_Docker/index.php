<?php
$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$uri = ltrim($uri, "/");
$uri = rtrim($uri, "/");
$uri = explode("/", $uri);
$second = strtolower($uri[1]);
$third = strtolower($uri[2]);

switch ($second){
    case "class":
        switch ( $method ) {
                case 'GET' : 
                    require __DIR__.'/api/class/read.php';
                    break;   
                case 'POST' : 
                    require __DIR__.'/api/class/create.php';
                    break;   
                case 'DELETE' : 
                    require __DIR__.'/api/class/delete.php';
                    break;   
                case 'PUT' : 
                    require __DIR__.'/api/class/update.php';
                    break;  
                case "GETONE":
                    require __DIR__ . "/api/class/readOne.php";
                    break;           
                }            
        break;
    
    case "student":
        switch ( $method ) {
            case 'GET' : 
                require __DIR__.'/api/student/read.php';
                break;              
            case 'POST' : 
                require __DIR__.'/api/student/create.php';
                break;  
            case 'DELETE' : 
                require __DIR__.'/api/student/delete.php';
                break;   
            case 'PUT' : 
                require __DIR__.'/api/student/update.php';
                break;              
            case "GETONE":
                require __DIR__ . "/api/student/readOne.php";
                break;
            }
        break;

        }




?>