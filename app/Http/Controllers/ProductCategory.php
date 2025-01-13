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
public function index() : View 
{ 
    $categories = Category::latest()->paginate(10); 
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
    $request->validate([ 
        'name' => 'required|min:100', 
    ]); 

    Category::create([ 
        'name' => $request->name
    ]); 

    return redirect()->route('categories.index')->with(['success' => 'Category Created Successfully!']); 
} 

/** 
* show 
* 
* @param string $id 
* @return View 
*/ 
public function show(string $id): View 
{ 
    $category = Category::findOrFail($id); 
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
    $category = Category::findOrFail($id); 
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
    $request->validate([ 
        'name' => 'required|min:100',
    ]); 

    $category = Category::findOrFail($id); 

    $category->update([ 
        'name' => $request->name, 
    ]); 

    return redirect()->route('categories.index')->with(['success' => 'Category Updated Successfully!']); 
} 

/** 
* destroy 
* 
* @param string $id 
* @return RedirectResponse 
*/ 
public function destroy(string $id): RedirectResponse 
{ 
    $category = Category::findOrFail($id); 

    $category->delete(); 

    return redirect()->route('categories.index')->with(['success' => 'Category Deleted Successfully!']); 
} 
}
