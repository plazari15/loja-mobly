<?php

namespace App\Observers;

use App\Categories;

class CategoriesObserver
{
    public function saving(Categories $category){
        $category->slug = str_slug($category->name);
    }
}
