<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NotificationRead;
use App\Events\NotificationReadAll;
use App\Events\SendNotification;
use App\Notifications\GeneralNotification;

class NotificationController extends Controller
{

    /**
     * Get user's notifications.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        // Limit the number of returned notifications, or return all
        $query = $user->unreadNotifications();
        $limit = (int) $request->input('limit', 0);
        if ($limit) {
            $query = $query->limit($limit);
        }

        $notifications = $query->get()->each(function ($n) {
            $n->created = $n->created_at->diffForHumans();
        });

        $total = $user->unreadNotifications->count();

        return compact('notifications', 'total');
    }

    /**
     * Create a new notification.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $channel = 'user-channel-';
        $message = [
            "text"=>"通知内容",
            "badge"=>"danger",
            "action_url" => "http://l.cn",
        ];


        $request->user()->notify(new GeneralNotification($message));

        event(new SendNotification($request->user()->id,$message,$channel));
        return response()->json(['status'=>true,'result'=>'Notification sent.'], 200);

    }

    /**
     * Mark user's notification as read.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function markAsRead(Request $request, $id)
    {
        $notification = $request->user()
            ->unreadNotifications()
            ->where('id', $id)
            ->first();

        if (is_null($notification)) {
            return response()->json(['status'=>false,'result'=>'Notification not found.'], 200);
        }

        $notification->markAsRead();

        //event(new NotificationRead($request->user()->id, $id));

        return response()->json(['status'=>true,'result'=>'Mark as read down.'], 200);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAllRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();

        //event(new NotificationReadAll($request->user()->id));

        $json_arr = ['status'=>true,'result'=>'Mark all read down completed.'];

        return response()->json($json_arr, 200);

    }

    public function deleteNotifications(Request $request)
    {
        $request->user()->notifications()->delete();

        return response()->json('Deletion notification completed.', 200);
    }
}
