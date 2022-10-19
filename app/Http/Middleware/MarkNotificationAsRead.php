<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MarkNotificationAsRead
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
       $notification_id = $request->query();
       if ($notification_id){
            $user = $request->user();
            if ($user) {
                $notification = $user->unreadNotifications()->find($notification_id);
                if ($notification) {
                    // UPDATE on read_at column in Notifications table.
                    $notification->markAsRead();
                }
            }
       }
        return $next($request);
    }
}
