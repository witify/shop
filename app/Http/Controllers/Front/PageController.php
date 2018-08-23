<?php

namespace App\Http\Controllers\Front;

use File;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Front\FrontController;

class PageController extends FrontController {

    /**
     * Redirects to the local root
     *
     * @return Redirect
     */
    public function index()
    {
        return redirect('/' . app()->getLocale());
    }

    /**
     * Find page from a slug and a locale
     *
     * @param string $locale
     * @param string $slug
     * @return View
     */
    public function getPage(Request $request, $locale, $segments = null)
    {
        if ($segments === null) {
            return $this->loadHomepage($request);
        }

        $page = Page::where('slug->' . $locale, $request->segment(2))->where('parent_id', null)->firstOrFail();
        
        $segmentsArray = $request->segments();
        $segmentsArray = array_slice($segmentsArray, 2); // remove locale and first slug

        foreach($segmentsArray as $segment) {
            $page = $page->children()->where('slug->' . $locale, $segment)->first();
            if ($page == null) {
                abort(404);
                break;
            }
        }

        return $this->loadPage($page, $request);
    }

    /**
     * Find and load the homepage
     *
     * @return mixed
     */
    private function loadHomepage(Request $request)
    {
        $page = Page::homepage();
        if ($page !== null) {
            return $this->loadPage($page, $request);
        }

        return 'Homepage not set';
    }

    /**
     * Load a view from a page
     *
     * @param Page $page
     * @return View
     */
    private function loadPage(Page $page, Request $request)
    {
        $this->seo()->setTitle($page->present()->seoAttribute('title'));
        $this->seo()->setDescription($page->present()->seoAttribute('description'));

        $className = "App\\Page\\" . studly_case(str_replace('.', '-', $page->name)) . "PageLoader";
        if (class_exists($className)) {
            return call_user_func($className . '::load', $request, $page);
        }

        if (File::exists(resource_path('views/app/front/pages/' . $page->name . '.blade.php'))) {
            return view('app.front.pages.' . $page->name, compact('page'));
        }

        return view('app.front.pages.default', compact('page'));
    }
}
