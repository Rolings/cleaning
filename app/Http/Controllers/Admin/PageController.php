<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\MetaDataMiddleware;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\File\FileService;
use Illuminate\Support\Collection;
use App\Http\Requests\Admin\Page\{StoreRequest, UpdateRequest};
use Illuminate\Support\Facades\Route;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as JavaScript;

class PageController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $item = Page::orderBy('id')->paginate(15);

        return view('admin.pages.index', [
            'items' => $item
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        JavaScript::put([
            'urls' => $this->getMainPageUrls()
        ]);

        return view('admin.pages.create', [
            'urls' => $this->getMainPageUrls()
        ]);
    }

    /**
     * @param StoreRequest $request
     * @param Page $page
     * @param FileService $fileService
     * @return RedirectResponse
     */
    public function store(StoreRequest $request, Page $page): RedirectResponse
    {
        $page->fill(array_merge($request->validated()))->save();

        return redirect()->route('admin.pages.index');
    }

    /**
     * @param Page $page
     * @return View
     */
    public function edit(Page $page): View
    {
        JavaScript::put([
            'urls' => $this->getMainPageUrls()
        ]);

        return view('admin.pages.edit', [
            'item' => $page,
            'urls' => $this->getMainPageUrls()
        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param Page $page
     * @param FileService $fileService
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Page $page): RedirectResponse
    {
        $page->fill(array_merge($request->validated()))->save();

        return redirect()->route('admin.pages.index');
    }

    /**
     * @param Page $page
     * @param FileService $fileService
     * @return RedirectResponse
     */
    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()->route('admin.pages.index');
    }

    /**
     * @return array
     */
    private function getMainPageUrls(): array
    {
        return collect(array_map(function ($route) {
            return [
                'value' => ucwords(str_replace('-', ' ', $route)),
                'key'   => $route,
            ];
        }, array_values(array_filter(array_map(function ($route) {
            if (in_array(MetaDataMiddleware::class, $route->middleware()) && strripos($route->getName(), '.index') !== false) {
                return $route->uri;
            }
        }, Route::getRoutes()->getRoutes()), function ($route) {
            return !is_null($route);
        }))))->pluck('value', 'key')->all();
    }
}
