<?php
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

// ---For File Upload on Server--- \\
if (!function_exists('FileUploadOnServer')) {
    function FileUploadOnServer($files, $imageFloder)
    {
        try {
            $uploadOnS3Server = env('ImageUploadOnS3Server');
            if ($uploadOnS3Server == 1) {
                $path = Storage::disk('s3')->put('uploads', $files);
                $path = Storage::disk('s3')->url($path);
            } else {
                $namewithextension = $files->getClientOriginalName();
                $name = explode('.', $namewithextension)[0]; // Filename 'filename'
                $filename = $name . "." . $files->getClientOriginalExtension();
                $dir = public_path("storage/" . $imageFloder);
                $path = $dir . "/" . $filename;
                if (!\File::isDirectory($dir)) {
                    \File::makeDirectory($dir, 493, true);
                }
                $files->move($dir, $filename);
                $path = url('/') . '/' . 'storage/' . $imageFloder . '/' . $filename;
            }

            return $path;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

/* Today Date */
if (!function_exists('todayDataGet')) {
    function todayDataGet()
    {
        try {
            $todayDate = Carbon::today();
            $date = date('D, d M Y', strtotime($todayDate));
            return $date;            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
