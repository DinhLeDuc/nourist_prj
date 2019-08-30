<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MediasController extends Controller
{
    public function index(Request $request)
    {
        $query = Media::orderby('id', 'desc');

        if ($request->has('media_filter_date')) {
            $query->whereMonth('created_at', date('m', strtotime($request->media_filter_date)));
            $query->whereYear('created_at', date('Y', strtotime($request->media_filter_date)));
        }

        if ($request->has('key')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%'.$request->key.'%')
                    ->orWhere('url', 'like', '%'.$request->key.'%');
            });
        }

        $medias = $query->paginate(PAGE_NUMBER);

        return response()->view('medias.index', compact('medias'));
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $folder_name = '/images/medias';
            $mediaFolder = public_path($folder_name);
            if (!File::exists($mediaFolder)) {
                $org_img = File::makeDirectory($mediaFolder, 0777, true);
            }
            $folder_name = $folder_name.'/'.date('Y');
            $mediaFolder = public_path($folder_name);
            if (!File::exists($mediaFolder)) {
                $org_img = File::makeDirectory($mediaFolder, 0777, true);
            }
            $folder_name = $folder_name.'/'.date('m');
            $mediaFolder = public_path($folder_name);
            if (!File::exists($mediaFolder)) {
                $org_img = File::makeDirectory($mediaFolder, 0777, true);
            }

            $file = $request->file;
            $fileName = (Media::latest()->first()->id + 1).'.'.$file->getClientOriginalExtension();
            $file->move($mediaFolder, $fileName);
            $media = Media::create([
                'user_id' => Auth()->user()->id,
                'title' => $file->getClientOriginalName(),
                'url' => $folder_name.'/'.$fileName,
            ]);

            return response()->json([
                'code' => 200,
                'message' => __('upload successful.'),
                'data' => $media,
            ]);
        } else {
            return response()->json([
                'code' => 400,
                'message' => __('không có dữ liệu file cần tải lên.'),
            ]);
        }
    }

    public function delete(Request $request)
    {
        $org->products()->whereIn('id', $ids)->get()->delete();
        $array_id = $this->request->query['array_id'];
        if (isset($this->request->query['array_image'])) {
            $array_image = $this->request->query['array_image'];
            foreach ($array_id as  $id) {
                $this->Post->id = $id;
                $this->Post->delete();
            }
            foreach ($array_image as $value) {
                unlink(WWW_ROOT.$value);
            }
            echo 'success';
        } else {
            foreach ($array_id as $key => $id) {
                $this->PostCategory->deleteAll([
                    'PostCategory.post_id' => $id,
                ]);
                $this->Post->id = $id;
                $this->Post->delete();
            }
            echo 'success';
        }
    }
}
