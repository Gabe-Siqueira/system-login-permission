-- Adminer 4.8.1 MySQL 8.0.31-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `system_login_permission` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `system_login_permission`;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jwt_permissions`;
CREATE TABLE `jwt_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jwt_permissions` (`id`, `token`, `local`, `created_at`, `updated_at`) VALUES
(1,	'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luL3VzZXIiLCJpYXQiOjE2NjcxNTgxNDEsImV4cCI6MTY2NzE2MTc0MSwibmJmIjoxNjY3MTU4MTQxLCJqdGkiOiJ1RXFFUjFxNEtDV0hQTjhHIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.oQgJjDxccrhX7_EgXFCih1YhYLXeF2jQ4GU5EOnoqRE',	'user',	'2022-10-30 19:29:01',	'2022-10-30 19:29:01'),
(2,	'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luL3VzZXIiLCJpYXQiOjE2NjcxNTgzMjIsImV4cCI6MTY2NzE2MTkyMiwibmJmIjoxNjY3MTU4MzIyLCJqdGkiOiI2TDNVZUYzejRITnF3MTRPIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.EA_sPE9ngAFKOzAjsObqwlrMB0NSH92LjxY_kw8ZhtI',	'user',	'2022-10-30 19:32:02',	'2022-10-30 19:32:02'),
(3,	'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luL3VzZXIiLCJpYXQiOjE2NjcxNjg1MzYsImV4cCI6MTY2NzE3MjEzNiwibmJmIjoxNjY3MTY4NTM2LCJqdGkiOiJsVjJUOEZXYzY3M0tjVUF6Iiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.LAYwaAG8ooXASygUMPRnc3zDEOujpd_IqcZ5QSheZnQ',	'user',	'2022-10-30 22:22:16',	'2022-10-30 22:22:16'),
(4,	'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luL3VzZXIiLCJpYXQiOjE2Njc0MTA5NjUsImV4cCI6MTY2NzQxNDU2NSwibmJmIjoxNjY3NDEwOTY1LCJqdGkiOiI4TXU5ZE5VWlBMN1JzaTlEIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.leeO2sQnEu-sb0Gi5_KhrY__IrH7GYnQRZrM-ZaQxLg',	'user',	'2022-11-02 17:42:45',	'2022-11-02 17:42:45'),
(5,	'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luL3VzZXIiLCJpYXQiOjE2Njc0MTEyMTAsImV4cCI6MTY2NzQxNDgxMCwibmJmIjoxNjY3NDExMjEwLCJqdGkiOiJvVWFwVm9qOU85OG1EQkhzIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.Gck5NQiRPiVy3suLUNV2Q0_C_RMHCdgcb-kwhNm2s4w',	'user',	'2022-11-02 17:46:50',	'2022-11-02 17:46:50'),
(6,	'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luL3VzZXIiLCJpYXQiOjE2Njc0MTI2NTUsImV4cCI6MTY2NzQxNjI1NSwibmJmIjoxNjY3NDEyNjU1LCJqdGkiOiJBbEtkVlVVTGVtbkxxYUtmIiwic3ViIjoiMiIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.d_9MLFnjXSkeZIVyGuvyRYvg4y7yOICrDoJ0fp4pH-s',	'user',	'2022-11-02 18:10:55',	'2022-11-02 18:10:55'),
(7,	'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luL3VzZXIiLCJpYXQiOjE2Njc0MTI2OTgsImV4cCI6MTY2NzQxNjI5OCwibmJmIjoxNjY3NDEyNjk4LCJqdGkiOiJOeGFoa0I1QkZxSHMwV05aIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.aSn6nwLSXydiRkeLIGN2lSdrR0boYJOVuEPGxSXQxTQ',	'user',	'2022-11-02 18:11:38',	'2022-11-02 18:11:38'),
(8,	'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luL3VzZXIiLCJpYXQiOjE2Njc0MTMyMTEsImV4cCI6MTY2NzQxNjgxMSwibmJmIjoxNjY3NDEzMjExLCJqdGkiOiJJTGx4MWFXeEZNdWRMdUdRIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.4Fhm_CERt_fchShSjJekigeQNn4FTozyaRzjKDeG1Ss',	'user',	'2022-11-02 18:20:11',	'2022-11-02 18:20:11'),
(9,	'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luL3VzZXIiLCJpYXQiOjE2Njc0Mzk1MjAsImV4cCI6MTY2NzQ0MzEyMCwibmJmIjoxNjY3NDM5NTIwLCJqdGkiOiJYcDJYMWUyQ1hETlRPSW5YIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.VHJQ-ssfTEtfRQS_Fbf79BUDsEVAUnRLcl6UXU1UsD4',	'user',	'2022-11-03 01:38:40',	'2022-11-03 01:38:40');

DROP TABLE IF EXISTS `log_erros`;
CREATE TABLE `log_erros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned NOT NULL,
  `Message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Code` int NOT NULL,
  `File` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Line` int NOT NULL,
  `TraceAsString` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_erros_id_user_foreign` (`id_user`),
  CONSTRAINT `log_erros_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `log_erros` (`id`, `id_user`, `Message`, `Code`, `File`, `Line`, `TraceAsString`, `created_at`, `updated_at`) VALUES
(1,	1,	'No query results for model [App\\Models\\Permission] 1',	0,	'/var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',	479,	'#0 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Support/Traits/ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->findOrFail()\n#1 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(2321): Illuminate\\Database\\Eloquent\\Model->forwardCallTo()\n#2 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(2333): Illuminate\\Database\\Eloquent\\Model->__call()\n#3 /var/www/system-login-permission/app/Http/Controllers/Api/PermissionApiController.php(106): Illuminate\\Database\\Eloquent\\Model::__callStatic()\n#4 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Controller.php(54): App\\Http\\Controllers\\Api\\PermissionApiController::show()\n#5 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php(43): Illuminate\\Routing\\Controller->callAction()\n#6 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Route.php(260): Illuminate\\Routing\\ControllerDispatcher->dispatch()\n#7 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Route.php(205): Illuminate\\Routing\\Route->runController()\n#8 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(725): Illuminate\\Routing\\Route->run()\n#9 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Routing\\Router->Illuminate\\Routing\\{closure}()\n#10 /var/www/system-login-permission/vendor/tymon/jwt-auth/src/Http/Middleware/Authenticate.php(32): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#11 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Tymon\\JWTAuth\\Http\\Middleware\\Authenticate->handle()\n#12 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php(50): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#13 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Routing\\Middleware\\SubstituteBindings->handle()\n#14 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#15 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php(102): Illuminate\\Routing\\Middleware\\ThrottleRequests->handleRequest()\n#16 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php(54): Illuminate\\Routing\\Middleware\\ThrottleRequests->handleRequestUsingNamedLimiter()\n#17 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Routing\\Middleware\\ThrottleRequests->handle()\n#18 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#19 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(726): Illuminate\\Pipeline\\Pipeline->then()\n#20 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(703): Illuminate\\Routing\\Router->runRouteWithinStack()\n#21 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(667): Illuminate\\Routing\\Router->runRoute()\n#22 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(656): Illuminate\\Routing\\Router->dispatchToRoute()\n#23 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php(190): Illuminate\\Routing\\Router->dispatch()\n#24 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Foundation\\Http\\Kernel->Illuminate\\Foundation\\Http\\{closure}()\n#25 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#26 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php(31): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle()\n#27 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull->handle()\n#28 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#29 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php(40): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle()\n#30 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\TrimStrings->handle()\n#31 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#32 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize->handle()\n#33 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php(86): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#34 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance->handle()\n#35 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Http/Middleware/HandleCors.php(62): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#36 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Http\\Middleware\\HandleCors->handle()\n#37 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php(39): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#38 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Http\\Middleware\\TrustProxies->handle()\n#39 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#40 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php(165): Illuminate\\Pipeline\\Pipeline->then()\n#41 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php(134): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter()\n#42 /var/www/system-login-permission/public/index.php(52): Illuminate\\Foundation\\Http\\Kernel->handle()\n#43 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/resources/server.php(16): require_once(\'...\')\n#44 {main}',	'2022-11-03 01:38:42',	'2022-11-03 01:38:42'),
(2,	1,	'No query results for model [App\\Models\\Permission] 3',	0,	'/var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',	479,	'#0 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Support/Traits/ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->findOrFail()\n#1 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(2321): Illuminate\\Database\\Eloquent\\Model->forwardCallTo()\n#2 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(2333): Illuminate\\Database\\Eloquent\\Model->__call()\n#3 /var/www/system-login-permission/app/Http/Controllers/Api/PermissionApiController.php(106): Illuminate\\Database\\Eloquent\\Model::__callStatic()\n#4 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Controller.php(54): App\\Http\\Controllers\\Api\\PermissionApiController::show()\n#5 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php(43): Illuminate\\Routing\\Controller->callAction()\n#6 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Route.php(260): Illuminate\\Routing\\ControllerDispatcher->dispatch()\n#7 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Route.php(205): Illuminate\\Routing\\Route->runController()\n#8 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(725): Illuminate\\Routing\\Route->run()\n#9 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Routing\\Router->Illuminate\\Routing\\{closure}()\n#10 /var/www/system-login-permission/vendor/tymon/jwt-auth/src/Http/Middleware/Authenticate.php(32): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#11 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Tymon\\JWTAuth\\Http\\Middleware\\Authenticate->handle()\n#12 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php(50): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#13 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Routing\\Middleware\\SubstituteBindings->handle()\n#14 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#15 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php(102): Illuminate\\Routing\\Middleware\\ThrottleRequests->handleRequest()\n#16 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php(54): Illuminate\\Routing\\Middleware\\ThrottleRequests->handleRequestUsingNamedLimiter()\n#17 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Routing\\Middleware\\ThrottleRequests->handle()\n#18 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#19 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(726): Illuminate\\Pipeline\\Pipeline->then()\n#20 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(703): Illuminate\\Routing\\Router->runRouteWithinStack()\n#21 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(667): Illuminate\\Routing\\Router->runRoute()\n#22 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(656): Illuminate\\Routing\\Router->dispatchToRoute()\n#23 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php(190): Illuminate\\Routing\\Router->dispatch()\n#24 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Foundation\\Http\\Kernel->Illuminate\\Foundation\\Http\\{closure}()\n#25 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#26 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php(31): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle()\n#27 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull->handle()\n#28 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#29 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php(40): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle()\n#30 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\TrimStrings->handle()\n#31 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#32 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize->handle()\n#33 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php(86): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#34 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance->handle()\n#35 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Http/Middleware/HandleCors.php(62): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#36 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Http\\Middleware\\HandleCors->handle()\n#37 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php(39): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#38 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Http\\Middleware\\TrustProxies->handle()\n#39 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#40 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php(165): Illuminate\\Pipeline\\Pipeline->then()\n#41 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php(134): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter()\n#42 /var/www/system-login-permission/public/index.php(52): Illuminate\\Foundation\\Http\\Kernel->handle()\n#43 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/resources/server.php(16): require_once(\'...\')\n#44 {main}',	'2022-11-03 01:38:55',	'2022-11-03 01:38:55'),
(3,	1,	'No query results for model [App\\Models\\Permission] 1',	0,	'/var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Builder.php',	479,	'#0 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Support/Traits/ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->findOrFail()\n#1 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(2321): Illuminate\\Database\\Eloquent\\Model->forwardCallTo()\n#2 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.php(2333): Illuminate\\Database\\Eloquent\\Model->__call()\n#3 /var/www/system-login-permission/app/Http/Controllers/Api/PermissionApiController.php(106): Illuminate\\Database\\Eloquent\\Model::__callStatic()\n#4 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Controller.php(54): App\\Http\\Controllers\\Api\\PermissionApiController::show()\n#5 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php(43): Illuminate\\Routing\\Controller->callAction()\n#6 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Route.php(260): Illuminate\\Routing\\ControllerDispatcher->dispatch()\n#7 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Route.php(205): Illuminate\\Routing\\Route->runController()\n#8 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(725): Illuminate\\Routing\\Route->run()\n#9 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Routing\\Router->Illuminate\\Routing\\{closure}()\n#10 /var/www/system-login-permission/vendor/tymon/jwt-auth/src/Http/Middleware/Authenticate.php(32): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#11 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Tymon\\JWTAuth\\Http\\Middleware\\Authenticate->handle()\n#12 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php(50): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#13 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Routing\\Middleware\\SubstituteBindings->handle()\n#14 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php(126): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#15 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php(102): Illuminate\\Routing\\Middleware\\ThrottleRequests->handleRequest()\n#16 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php(54): Illuminate\\Routing\\Middleware\\ThrottleRequests->handleRequestUsingNamedLimiter()\n#17 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Routing\\Middleware\\ThrottleRequests->handle()\n#18 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#19 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(726): Illuminate\\Pipeline\\Pipeline->then()\n#20 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(703): Illuminate\\Routing\\Router->runRouteWithinStack()\n#21 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(667): Illuminate\\Routing\\Router->runRoute()\n#22 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Routing/Router.php(656): Illuminate\\Routing\\Router->dispatchToRoute()\n#23 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php(190): Illuminate\\Routing\\Router->dispatch()\n#24 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(141): Illuminate\\Foundation\\Http\\Kernel->Illuminate\\Foundation\\Http\\{closure}()\n#25 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#26 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ConvertEmptyStringsToNull.php(31): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle()\n#27 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull->handle()\n#28 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php(21): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#29 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TrimStrings.php(40): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle()\n#30 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\TrimStrings->handle()\n#31 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#32 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize->handle()\n#33 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/PreventRequestsDuringMaintenance.php(86): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#34 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance->handle()\n#35 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Http/Middleware/HandleCors.php(62): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#36 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Http\\Middleware\\HandleCors->handle()\n#37 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php(39): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#38 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(180): Illuminate\\Http\\Middleware\\TrustProxies->handle()\n#39 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}()\n#40 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php(165): Illuminate\\Pipeline\\Pipeline->then()\n#41 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php(134): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter()\n#42 /var/www/system-login-permission/public/index.php(52): Illuminate\\Foundation\\Http\\Kernel->handle()\n#43 /var/www/system-login-permission/vendor/laravel/framework/src/Illuminate/Foundation/resources/server.php(16): require_once(\'...\')\n#44 {main}',	'2022-11-03 01:40:21',	'2022-11-03 01:40:21');

DROP TABLE IF EXISTS `log_update`;
CREATE TABLE `log_update` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned NOT NULL,
  `table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_register` int NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `log_update_id_user_foreign` (`id_user`),
  CONSTRAINT `log_update_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `log_update` (`id`, `id_user`, `table`, `id_register`, `field`, `old_value`, `new_value`, `modified_at`) VALUES
(1,	1,	'users',	3,	'id_profile',	'3',	'2',	'2022-10-31 23:21:40'),
(2,	1,	'users',	3,	'id_profile',	'2',	'3',	'2022-10-31 23:21:50'),
(3,	1,	'users',	3,	'email',	'teste@teste.com',	'teste@user.com',	'2022-10-31 23:21:50'),
(4,	1,	'users',	3,	'email',	'teste@user.com',	'teste@teste.com',	'2022-10-31 23:21:55'),
(5,	1,	'menu',	1,	'id_menu_type',	'3',	'2',	'2022-11-01 03:33:53'),
(6,	1,	'menu',	1,	'id_menu_type',	'2',	'1',	'2022-11-01 03:33:58'),
(7,	1,	'menu',	1,	'id_menu_type',	'1',	'3',	'2022-11-01 03:34:06'),
(8,	1,	'permission',	1,	'name',	'Teste',	'Teste 1',	'2022-11-01 03:47:17'),
(9,	1,	'permission',	1,	'name',	'Teste 1',	'Teste',	'2022-11-01 03:47:32'),
(10,	1,	'menu',	9,	'name',	'Arquio',	'Arquivo',	'2022-11-03 00:55:43');

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_menu_type` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id_menu_type_foreign` (`id_menu_type`),
  CONSTRAINT `menu_id_menu_type_foreign` FOREIGN KEY (`id_menu_type`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menu` (`id`, `id_menu_type`, `name`, `link`, `icon`, `order`, `created_at`, `updated_at`) VALUES
(1,	3,	'Usuário',	'user.index',	NULL,	1,	'2022-11-01 06:21:50',	'2022-11-01 06:34:06'),
(3,	3,	'Menu',	'menu.index',	NULL,	2,	'2022-11-02 21:56:52',	'2022-11-02 21:56:52'),
(4,	3,	'Permissão',	'permission.index',	NULL,	3,	'2022-11-02 21:57:30',	'2022-11-02 21:57:30'),
(5,	3,	'Curso',	'course.index',	NULL,	4,	'2022-11-02 22:09:22',	'2022-11-02 22:09:22'),
(6,	3,	'Categoia',	'category.index',	NULL,	5,	'2022-11-02 22:09:38',	'2022-11-02 22:09:38'),
(9,	3,	'Arquivo',	'file.index',	NULL,	0,	'2022-11-03 03:27:38',	'2022-11-03 03:55:43');

DROP TABLE IF EXISTS `menu_type`;
CREATE TABLE `menu_type` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_type_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menu_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'menu',	'2022-10-30 20:13:50',	'2022-10-30 20:13:50'),
(2,	'submenu',	'2022-10-30 20:13:50',	'2022-10-30 20:13:50'),
(3,	'tela',	'2022-10-30 20:13:50',	'2022-10-30 20:13:50');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2022_10_30_143241_create_jwt_permissions_table',	1),
(6,	'2022_10_30_143649_create_log_erros_table',	1),
(7,	'2022_10_30_143957_create_log_update_table',	1),
(8,	'2022_10_30_145151_create_profile_table',	1),
(9,	'2022_10_30_150903_create_foreign_users_table',	1),
(10,	'2022_10_30_165446_create_menu_type_table',	2),
(11,	'2022_10_30_165635_create_menu_table',	2),
(12,	'2022_10_30_170534_create_foreign_menu_table',	2),
(13,	'2022_10_30_175141_create_user_menu_table',	3),
(14,	'2022_10_30_175727_create_permission_table',	4),
(15,	'2022_10_30_185248_create_user_permission_table',	5),
(16,	'2022_10_30_185934_create_user_menu_table',	5);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_menu` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permission` (`id`, `id_menu`, `name`, `created_at`, `updated_at`) VALUES
(21,	1,	'Usuário',	'2022-11-03 00:58:31',	'2022-11-03 00:58:31'),
(22,	3,	'Menu',	'2022-11-03 00:58:48',	'2022-11-03 00:58:48'),
(23,	4,	'Permissão',	'2022-11-03 00:58:54',	'2022-11-03 00:58:54'),
(24,	5,	'Curso',	'2022-11-03 00:59:30',	'2022-11-03 00:59:30'),
(25,	6,	'Categoia',	'2022-11-03 00:59:40',	'2022-11-03 00:59:40'),
(27,	9,	'Arquivo',	'2022-11-03 03:55:55',	'2022-11-03 03:55:55');

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profile_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `profile` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'root',	'2022-10-30 19:19:44',	'2022-10-30 19:19:44'),
(2,	'admin',	'2022-10-30 19:19:44',	'2022-10-30 19:19:44'),
(3,	'user',	'2022-10-30 19:19:44',	'2022-10-30 19:19:44');

DROP TABLE IF EXISTS `user_menu`;
CREATE TABLE `user_menu` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned NOT NULL,
  `id_menu` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_menu_id_user_foreign` (`id_user`),
  KEY `user_menu_id_menu_foreign` (`id_menu`),
  CONSTRAINT `user_menu_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`),
  CONSTRAINT `user_menu_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user_menu` (`id`, `id_user`, `id_menu`) VALUES
(40,	1,	1),
(41,	2,	1),
(42,	1,	3),
(43,	1,	4),
(44,	2,	4),
(45,	1,	5),
(46,	6,	5),
(49,	1,	6),
(50,	6,	6),
(71,	6,	9);

DROP TABLE IF EXISTS `user_permission`;
CREATE TABLE `user_permission` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned NOT NULL,
  `id_permission` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_permission_id_user_foreign` (`id_user`),
  KEY `user_permission_id_permission_foreign` (`id_permission`),
  CONSTRAINT `user_permission_id_permission_foreign` FOREIGN KEY (`id_permission`) REFERENCES `permission` (`id`),
  CONSTRAINT `user_permission_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_profile` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_id_profile_foreign` (`id_profile`),
  CONSTRAINT `users_id_profile_foreign` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `id_profile`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	1,	'root',	'root@root.com',	'2022-10-30 19:19:44',	'$2y$10$6mrVJnBXELEPn.J3zXgGY.mHC8Tu2WyNi.pmXDMO3eeoSIhfU1hzy',	NULL,	'2022-10-30 19:19:44',	'2022-10-30 19:19:44'),
(2,	2,	'admin',	'admin@admin.com',	NULL,	'$2y$10$RTWWc.xIZQfkAJX0GXOX0uZJqu0VjAtdwsGW4TBunaYXV2vKH24LO',	NULL,	'2022-11-01 00:33:12',	'2022-11-01 00:33:12'),
(6,	3,	'user1',	'user1@user1.com',	NULL,	'$2y$10$JopMA2Ttreacm4WOTEAnMe/GVf1ZBROwsnELY82SpPlGGTyBdEwoK',	NULL,	'2022-11-02 17:36:11',	'2022-11-02 17:36:11');

-- 2022-11-03 03:57:16
