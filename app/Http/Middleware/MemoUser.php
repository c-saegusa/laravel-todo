<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MemoUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $auth = auth()->user()->id;
   

   
        if (!empty($request->folder)) {
            $folder_user = $request->folder->user_id;
            if ($folder_user !== $auth) {
                abort(404);
            }
        }else{
            $memo_user = $request->memo->folder->user_id;
            if ($memo_user !== $auth) {
                abort(404);
            }
        }
           return $next($request);
       }
}
