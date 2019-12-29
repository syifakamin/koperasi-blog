<?php

namespace App\http\View;

use Illuminate\View\View;
use App\Category;

class CategoryComposer
{
    public function compose(View $View)
    {
        $categories = Category::with(['child'])->withCount((['child']))->getParent()->orderBy('name', 'ASC')->get();
        $View->with('categories', $categories);
    }
}