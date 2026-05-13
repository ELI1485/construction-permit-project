<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class DocumentScannerService
{
    /**
     * Required document keywords — at least one uploaded file name must loosely
     * match each group. This mimics the rokhas.ma mandatory-checklist logic.
     *
     * @var array<string, array<string>>
     */
    protected array $requiredDocumentGroups = [
        'cin' => ['cin', 'cni', 'identite', 'carte', 'national', 'id'],
        'titre' => ['titre', 'propriete', 'ownership', 'foncier', 'acte', 'kiraie', 'bail', 'extrait'],
        'plan' => ['plan', 'schema', 'dessin', 'blueprint', 'arch', 'facade', 'coupe'],
    ];

    /** Allowed MIME types for uploaded documents */
    protected array $allowedMimes = [
        'application/pdf',
        'image/jpeg',
        'image/jpg',
        'image/png',
    ];

    /**
     * Scan a list of uploaded files and return a validation result.
     *
     * @param  UploadedFile[]  $files
     * @return array{passed: bool, missing: string[], reason: string}
     */
    public function scan(array $files): array
    {
        // Rule 1 — at least one document must be uploaded
        if (empty($files)) {
            return $this->fail('لم يتم رفع أي وثيقة. يجب إرفاق الوثائق الإلزامية قبل تقديم الطلب.', [
                'cin', 'titre', 'plan',
            ]);
        }

        // Rule 2 — every uploaded file must be valid (non-zero, allowed type)
        foreach ($files as $file) {
            if (! $file->isValid() || $file->getSize() === 0) {
                return $this->fail("الملف \"{$file->getClientOriginalName()}\" تالف أو فارغ.", []);
            }

            if (! in_array($file->getMimeType(), $this->allowedMimes, true)) {
                return $this->fail(
                    "نوع الملف \"{$file->getClientOriginalName()}\" غير مقبول. المقبول: PDF، JPG، PNG.",
                    []
                );
            }
        }

        // Rule 3 — check required document groups by filename keyword matching
        $uploadedNames = array_map(
            fn (UploadedFile $f) => mb_strtolower($f->getClientOriginalName()),
            $files
        );

        $missing = [];
        foreach ($this->requiredDocumentGroups as $group => $keywords) {
            $found = false;
            foreach ($uploadedNames as $name) {
                foreach ($keywords as $keyword) {
                    if (str_contains($name, $keyword)) {
                        $found = true;
                        break 2;
                    }
                }
            }
            if (! $found) {
                $missing[] = $group;
            }
        }

        if (! empty($missing)) {
            $labels = [
                'cin' => 'بطاقة التعريف الوطنية (CIN)',
                'titre' => 'وثيقة الملكية أو عقد الكراء',
                'plan' => 'المخطط الهندسي / التصميم المعماري',
            ];

            $missingLabels = array_map(fn ($k) => $labels[$k] ?? $k, $missing);
            $reason = 'الوثائق التالية مفقودة: '.implode(' — ', $missingLabels).'. سيتم رفض الطلب تلقائياً.';

            return $this->fail($reason, $missing);
        }

        return ['passed' => true, 'missing' => [], 'reason' => ''];
    }

    /**
     * Build a failure result.
     *
     * @param  string[]  $missing
     * @return array{passed: bool, missing: string[], reason: string}
     */
    private function fail(string $reason, array $missing): array
    {
        return ['passed' => false, 'missing' => $missing, 'reason' => $reason];
    }
}
