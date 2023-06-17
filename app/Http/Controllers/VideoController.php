<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::all();
        return view('contents.video', ['videos' => $videos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contents.video-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required']
        ]);

        $file = $request->file('file_upload');
        $filename = str_replace(" ", "_", $request->post('name')) . '-' . md5(date('Y-m-d H:i:s')) . '.' .$file->extension();

        $path = 'public/videos';

        $path = $file->storeAs($path, $filename);
        
        if ( ! $path ) {
            echo "error upload";exit;
        }

        $videoData = array(
            'name'          => $request->post('name'),
            'path'          => $path,
            'created_by'    => Auth::id()
        );

        $create = Video::create($videoData);

        if ( !$create ) {
            echo "error create";exit;
        }
 
        return redirect()->route('video');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $video = Video::find($id);

        $video->path = Storage::url($video->path);
        
        dump($video);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = Video::find($id);

        if (! $video->delete()) {
            echo "delete failed";
        }

        return redirect()->route('video');
    }
}
