<?php

namespace App\Http\Resources\Message;
use App\Message;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GetMsgChat extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'message'=>DB::select('
            SELECT t1.*
            FROM messages AS t1
            INNER JOIN
            (
                SELECT
                    LEAST(user_id, to_user_id) AS user_id,
                    GREATEST(user_id, to_user_id) AS to_user_id,
                    MAX(id) AS max_id
                FROM messages
                GROUP BY
                    LEAST(user_id, to_user_id),
                    GREATEST(user_id, to_user_id)
            ) AS t2
                ON LEAST(t1.user_id, t1.to_user_id) = t2.user_id AND
                   GREATEST(t1.user_id, t1.to_user_id) = t2.to_user_id AND
                   t1.id = t2.max_id
                WHERE t1.user_id = ? OR t1.to_user_id = ?
            ',[auth('api')->id(),auth('api')->id()]),

        ];
    }
}
