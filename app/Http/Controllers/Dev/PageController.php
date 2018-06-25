<?php

namespace App\Http\Controllers\Dev;

use App\Page;
use App\Http\Requests\PageRequest;
use Symfony\Component\HttpFoundation\Request;

class PageController extends DevController
{
    /**
     * All pages
     * 
     * @return View
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return Page::search()->sort()->paginate(10)->toJson();
        }
        return view('app.dev.page.index');
    }

    /**
     * Create a page
     *
     * @return View
     */
    public function create()
    {
        return view('app.dev.page.create');
    }

    /**
     * Store a page
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $data = $request->all();
        $data['seo'] = [
            'title' => $data['title'],
            'description' => $data['title']
        ];
        
        Page::create($data);

        flash('Page successfully create', 'success');
        
        return $this->json()->redirect('/dev/page');
    }

    /**
     * Edit a page
     *
     * @return View
     */
    public function edit(Page $page)
    {
        return view('app.dev.page.edit', compact('page'));
    }

    /**
     * Update a page
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $page->update($request->all());
        foreach ($request->sections as $key => $section) {
            if ($section['type'] === 'picture') {
                $page->uploadImageFromTemp('sections->' . $key . '->value', $section['value']);
            }
        }
        $page->save();
        flash('Page successfully update', 'success');
        return $this->json()->redirect('/dev/page');
    }

    /**
     * Destroy a page
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return $this->json()->success('Page successfully deleted');
    }
}
