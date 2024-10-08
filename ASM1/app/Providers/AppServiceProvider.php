<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $categories = Category::paginate(5);
            $products = Product::all();
            $highestPriceProducts = Product::query()
                ->orderBy('price', 'desc')
                ->limit(10)
                ->get();

    
                // Query to filter products based on category_id if provided
                $productByCategoryQuery = Product::query()
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'categories.id as cate_id', 'categories.name as cate_name');
    
                if ($view->category_id) {
                    $productByCategoryQuery->where('products.category_id', $view->category_id);
                }
    
                $productByCategory = $productByCategoryQuery->get();
                
    
          
            $view->with(compact('categories', 'products', 'highestPriceProducts', 'productByCategory')); // Pass the categories to all views.
        });
        view()->composer('productDetail', function ($view) {

            if ($view->productDetail) {
                $relatedProducts = Product::where('category_id', $view->productDetail->category_id)
                    ->where('id', '!=', $view->productDetail->id)
                    ->take(10)
                    ->get();

                $view->with(compact('relatedProducts'));
            }
        });
    }
}
