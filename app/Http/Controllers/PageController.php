<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Content;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class PageController extends Controller
{
    private function getPage($id) {
        $page = Content::find($id);
        if (!$page){
            return abort(404);
        } 
        return $page;
    }

    private function uploadThumbnail(Request $request, $default = '') {  
        if($request->hasFile('thumbnail')) {
            return $request->thumbnail->store('images', 'public');
        }
    
        return $default;
    }

    public function list() {
        $pages = Content::where('type', 'page')->paginate(10);
        return view('pages.list', ['pages' => $pages]);
    }

    public function create() {
        return view('pages.create');
    }

    public function update($id) {
        return view('pages.update', ['page' => $this->getPage($id)]);
    }
    
    public function delete($id) {
        $page = $this->getPage($id);
        $page->delete();

        return redirect()->route('pages')->withSuccess('Page successfully deleted');
    }

    public function postCreate(CreatePageRequest $request) {
        Content::create([
            "id" => Uuid::uuid4(),
            "slug" => Str::slug($request->name),
            "name" => $request->name,
            "content" => $request->content,
            "type" => 'page',
            "metas" => '[]',
            "description" =>  $request->description,
            "thumbnail" => $this->uploadThumbnail($request)
        ]);

        return redirect()->route('pages')->withSuccess('Page successfully created');
    }

    public function postUpdate($id, UpdatePageRequest $request) {
        $page = $this->getPage($id);

        $page->name = $request->name;
        $page->content = $request->content;
        $page->description = $request->description;
        $page->thumbnail = $this->uploadThumbnail($request, $page->thumbnail);
        $page->save();

        return redirect()->route('pages')->withSuccess('Page successfully updated');
    }
}
