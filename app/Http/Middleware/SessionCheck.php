<?php
namespace App\Http\Middleware;
use Session;
use Closure;
 class SessionCheck{

 	public function handle($request, Closure $next){

 		if(Session::has("id")){
 			return $next($request);
 		}else{
 			return redirect("/login");
 		}
 	}
 }