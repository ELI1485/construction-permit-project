<?php

namespace App\Services;

use App\Models\Permit;
use App\Models\PermitHistory;

class WorkflowService
{
    public static function changeStatus(Permit $permit, int $newStatusId, int $changedBy, string $comment = ''): void
    {
        $oldStatusId = $permit->status_id;

        $permit->update(['status_id' => $newStatusId]);

        PermitHistory::create([
            'permit_id'     => $permit->id,
            'old_status_id' => $oldStatusId,
            'new_status_id' => $newStatusId,
            'changed_by'    => $changedBy,
            'commentaire'   => $comment,
            'changed_at'    => now(),
        ]);
    }
}