<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        // Get all categories
        $categories = Category::latest()->paginate(10);
        
        // Render view with categories
        return view('categories.index', compact('categories'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate form
        $request->validate([
            'nama' => 'required|min:3'
        ]);

        // Create category
        Category::create([
            'nama' => $request->nama
        ]);

        // Redirect to index
        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param string $id
     * @return View
     */
    public function show(string $id): View
    {
        // Get category by ID
        $category = Category::findOrFail($id);

        // Render view with category
        return view('categories.show', compact('category'));
    }

    /**
     * edit
     *
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        // Get category by ID
        $category = Category::findOrFail($id);

        // Render view with category
        return view('categories.edit', compact('category'));
    }

    /**
     * update
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate form
        $request->validate([
            'nama' => 'required|min:3'
        ]);

        // Get category by ID
        $category = Category::findOrFail($id);

        // Update category
        $category->update([
            'nama' => $request->nama
        ]);

        // Redirect to index
        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        // Get category by ID
        $category = Category::findOrFail($id);

        // Delete category
        $category->delete();

        // Redirect to index
        return redirect()->route('categories.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}