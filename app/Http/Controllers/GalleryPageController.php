<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryImageRequest;
use App\Models\GalleryImage;
use App\Services\FileService;
use Illuminate\Http\Request;

class GalleryPageController extends Controller
{
    public function __construct(private readonly FileService $file_service) {}

    public function index() {
        $images = GalleryImage::orderBy('created_at', 'desc')->paginate(30);

        return view('gallery.index', compact('images'));
    }

    public function store(GalleryImageRequest $request) {
        $image_path = $this->file_service->uploadFile('images/gallery', $request->file('file'));

        GalleryImage::create([
            'image_path' => $image_path,
        ]);

        return redirect()->route('gallery');
    }

    public function destroy(GalleryImage $image) {
        $this->file_service->deleteFile(public_path($image->image_path));

        $image->delete();

        return response()->json(['success' => true]);
    }
}
