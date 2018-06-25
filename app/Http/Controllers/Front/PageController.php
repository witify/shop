<?php

namespace App\Http\Controllers\Front;

use File;
use App\Page;
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
    public function getPage($locale, $slug = null)
    {
        if ($slug === null) {
            return $this->loadHomepage();
        }

        $locale = app()->getLocale();

        $page = Page::where('slug->' . $locale, $slug)->firstOrFail();

        return $this->loadPage($page);
    }

    /**
     * Find and load the homepage
     *
     * @return mixed
     */
    private function loadHomepage()
    {
        $page = Page::homepage();
        if ($page !== null) {
            return $this->loadPage($page);
        }

        return 'Homepage not set';
    }

    /**
     * Load a view from a page
     *
     * @param Page $page
     * @return View
     */
    private function loadPage(Page $page)
    {
        $this->seo()->setTitle($page->present()->seoAttribute('title'));
        $this->seo()->setDescription($page->present()->seoAttribute('description'));

        $data = [
            'page' => $page,
            'currentPage' => $page
        ];

        if (File::exists(resource_path('views/app/front/pages/' . $page->view . '.blade.php'))) {
            return view('app.front.pages.' . $page->view, $data);
        }

        return view('app.front.pages.default', $data);
    }
}
