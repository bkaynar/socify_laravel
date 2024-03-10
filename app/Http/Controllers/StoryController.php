<?php

namespace App\Http\Controllers;

use App\Models\StoryModel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class StoryController extends Controller
{
    public function index()
    {
        $stories = StoryModel::orderBy('oncelik', 'DESC')->orderBy('id', 'ASC')->where('silindi', 0)->get();
        return view('pages.story.story', compact('stories'));
    }

    public function store(Request $request)
    {
        $story = new StoryModel();
        $story->title = $request->title;
        if ($request->hasFile('ana_foto')) {
            $image = $request->file('ana_foto');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/story/' . $filename);
            Image::make($image->getRealPath())->resize(540, 960)->save($path);

        }
        $story->ana_foto = 'images/story/' . $filename;
        if ($request->hasFile('fotograf')) {
            $image = $request->file('fotograf');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/story/' . $filename);
            Image::make($image->getRealPath())->resize(540, 960)->save($path);

        }
        $story->fotograf = 'images/story/' . $filename;
        $story->oncelik = 0;
        $story->aktif = 1;
        $story->silindi = 0;
        $story->save();
        return response()->json(['success' => 'Başarıyla Eklendi']);
    }
    public function aktiflik($id)
    {
        $story = StoryModel::find($id);
        if ($story->aktif == 1) {
            $story->aktif = 0;
        } else {
            $story->aktif = 1;
        }
        $story->save();
        return response()->json(['success' => 'Başarıyla Güncellendi', 'aktif' => $story->aktif]);
    }
    public function oncelikver($id)
    {
        $story = StoryModel::find($id);
        if ($story->oncelik == 1) {
            $story->oncelik = 0;
        } else {
            $story->oncelik = 1;
        }
        $story->save();
        return response()->json(['success' => 'Başarıyla Güncellendi', 'oncelik' => $story->oncelik]);
    }
    public function destroy($id)
    {
        $story = StoryModel::find($id);
        $story->silindi = 1;
        $story->save();
        return response()->json(['success' => 'Başarıyla Silindi']);
    }

    public function listele()
    {
        //silindi 0 , aktif 1 ve sadece title,ana_foto,fotograf verilerini getir
        $stories = StoryModel::orderBy('oncelik','DESC')->where('silindi', 0)->where('aktif', 1)->get(['title', 'ana_foto', 'fotograf']);
        return response()->json($stories);
    }
}
