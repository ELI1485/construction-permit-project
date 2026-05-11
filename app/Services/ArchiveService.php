<?php

namespace App\Services;

use App\Models\Archive;
use App\Models\Status;
use App\Services\WorkflowService;

class ArchiveService
{
    public static function archive(Permit $permit, int $archivedBy, string $reason = ''): void
    {
        Archive::create([
            'permit_id'      => $permit->id,
            'archived_by'    => $archivedBy,
            'archive_date'   => now(),
            'archive_reason' => $reason,
        ]);

        $archivedStatus = Status::where('nom', 'Archivé')->first();
        if ($archivedStatus) {
            WorkflowService::changeStatus($permit, $archivedStatus->id, $archivedBy, $reason);
        }
    }
}