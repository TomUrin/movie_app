<?php

namespace App\Http\Controllers;


use App\Models\News;
use Illuminate\Contracts\View\View;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'news' => News::latest()->get(),
        ]);
    }

    public function show(News $news): View
    {
        return view('news.show', [
            'news'     => $news,
            'comments' => $news->comments()->paginate(5)
        ]);
    }

    public function create(): View
    {
        return view('news.create');
    }

    public function store(NewsRequest $request)
    {
        $data = $request->validated();

        $new = new News();
        $new->title = $data['title'];
        $new->text  = $data['content'];
        $new->save();

        return redirect('/news/'.$new->id);
    }
}
