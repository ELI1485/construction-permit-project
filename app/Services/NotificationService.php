<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    public static function notify(int $userId, int $permitId, string $titre, string $message): void
    {
        Notification::create([
            'user_id'   => $userId,
            'permit_id' => $permitId,
            'titre'     => $titre,
            'message'   => $message,
            'is_read'   => false,
        ]);
    }
}