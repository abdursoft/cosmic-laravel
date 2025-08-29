<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use ZipArchive;

trait IssueHelper
{
    public function uploadIssue($request)
    {
        $zipFile = $request->file('issue');
        $zipName = pathinfo($zipFile->getClientOriginalName(), PATHINFO_FILENAME);

        // Save ZIP in public/archive
        $archivePath = public_path("archive");
        if (! File::exists($archivePath)) {
            File::makeDirectory($archivePath, 0777, true);
        }

        $savedZipPath = $archivePath . '/' . $zipFile->getClientOriginalName();
        $zipFile->move($archivePath, $zipFile->getClientOriginalName());

        // Extract to storage/app/{zipName}
        $extractPath = storage_path("app/public/issues/{$zipName}");
        if (File::exists($extractPath)) {
            File::deleteDirectory($extractPath);
        }

        $zip = new ZipArchive();
        if ($zip->open($savedZipPath) === true) {
            $zip->extractTo($extractPath);
            $zip->close();
        } else {
            throw new \Exception("Failed to extract ZIP");
        }

        // Return the relative path to store in DB (for later download)
        return [
            'archive' => "archive".$zipFile->getClientOriginalName(),
            'issue'   => "app/public/issues/{$zipName}",
        ];
    }
}
