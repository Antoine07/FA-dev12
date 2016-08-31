<?php

namespace App\ViewComposer;

use App\Category;
use Illuminate\View\View;

class MenuComposer
{
    private $category = null;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

   public function compose(View $view)
   {
       $categories = $this->category->all();

       $view->with('categories', $categories);
   }

}