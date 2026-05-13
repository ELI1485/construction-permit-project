<?php

use App\Services\DocumentScannerService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

it('rejects when no files are uploaded', function () {
    $scanner = new DocumentScannerService;
    $result  = $scanner->scan([]);

    expect($result['passed'])->toBeFalse()
        ->and($result['reason'])->toContain('لم يتم رفع أي وثيقة');
});

it('rejects when a file has an invalid mime type', function () {
    $scanner = new DocumentScannerService;
    $file    = UploadedFile::fake()->create('malicious.exe', 10, 'application/octet-stream');

    $result = $scanner->scan([$file]);

    expect($result['passed'])->toBeFalse()
        ->and($result['reason'])->toContain('غير مقبول');
});

it('rejects when mandatory document groups are missing', function () {
    $scanner = new DocumentScannerService;
    // Only a CIN uploaded — plan and titre are missing
    $cin = UploadedFile::fake()->create('cin_scan.pdf', 100, 'application/pdf');

    $result = $scanner->scan([$cin]);

    expect($result['passed'])->toBeFalse()
        ->and($result['missing'])->toContain('plan')
        ->and($result['missing'])->toContain('titre');
});

it('passes when all three mandatory document groups are present', function () {
    $scanner = new DocumentScannerService;
    $cin     = UploadedFile::fake()->create('cin_nationale.pdf', 100, 'application/pdf');
    $titre   = UploadedFile::fake()->create('titre_propriete.pdf', 200, 'application/pdf');
    $plan    = UploadedFile::fake()->create('plan_architectural.pdf', 300, 'application/pdf');

    $result = $scanner->scan([$cin, $titre, $plan]);

    expect($result['passed'])->toBeTrue()
        ->and($result['missing'])->toBeEmpty();
});

it('passes when filenames use uppercase letters', function () {
    $scanner = new DocumentScannerService;
    $cin     = UploadedFile::fake()->create('CIN_MAROC.PDF', 100, 'application/pdf');
    $titre   = UploadedFile::fake()->create('ACTE_PROPRIETE.pdf', 200, 'application/pdf');
    $plan    = UploadedFile::fake()->create('PLAN_FACADE.jpg', 300, 'image/jpeg');

    $result = $scanner->scan([$cin, $titre, $plan]);

    expect($result['passed'])->toBeTrue();
});

it('rejects a zero-byte file', function () {
    $scanner = new DocumentScannerService;
    $empty   = UploadedFile::fake()->create('empty.pdf', 0, 'application/pdf');

    $result = $scanner->scan([$empty]);

    expect($result['passed'])->toBeFalse();
});
