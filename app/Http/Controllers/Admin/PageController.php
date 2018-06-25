<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Http\Requests\PageRequest;
use Symfony\Component\HttpFoundation\Request;

class PageController extends AdminController
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
        return view('app.admin.page.index');
    }

    /**
     * Edit a page
     *
     * @return View
     */
    public function edit(Page $page)
    {
        return view('app.admin.page.edit', compact('page'));
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
        flash('Page successfully updated', 'success');
        return $this->json()->redirect('/admin/page');
    }
}
