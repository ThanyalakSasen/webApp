<?php
class CheckAdmin
{
    /**
     * Handle an incoming request.
     * 
     * @param \Illuminate\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Respone|\Iluminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next){
        if(!Auth::check()){
            return redirect()->route('error');
        }

        if(Auth::user()->usertype === 'admin'){
            return $next($request);
        }

        return redirect()->route('error');
    } 
}