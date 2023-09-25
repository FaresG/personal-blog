<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogDatabaseQueries
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        DB::enableQueryLog();
        $response =  $next($request);
        $queries = DB::getQueryLog();

        if (!empty($queries)) {
            foreach($queries as $query) {
                // Save to database
                DB::table('logs')->insert([
                    'user_id' => $request->user()?->id,
                    'log_type' => 'db_query',
                    'ip_address' => $request->ip(),
                    'details' => $query['query']
                ]);

                // save to log file
                Log::channel('database')->info('[By ' . $request->user()?->username . ']: ' . $query['query']);
            }
        }

        return $response;
    }
}
