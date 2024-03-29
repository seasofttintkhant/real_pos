<?php

namespace App\Observers;

use App\Product;
use App\Category;

class ProductObserver
{
    /**
     * Handle the product "created" event.
     *
     * @param  \App\Product  $product
     * @return void
     */

    public function created(Product $product)
    {
        //
        $this->updateCategoryQuantity($product);        
    }

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
        $this->updateCategoryQuantity($product);  
    }

    /**
     * Handle the product "deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
        $this->updateCategoryQuantity($product);  
    }

    /**
     * Handle the product "restored" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
        $this->updateCategoryQuantity($product);  
    }

    /**
     * Handle the product "force deleted" event.
     *
     * @param  \App\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
        $this->updateCategoryQuantity($product);  
    }

    /**
     * Update the qunantity of product in each category
     * @param \App\Product $product
     * @return void
     */

    protected function updateCategoryQuantity($product){
        $category = Category::find($product->category_id);
        $category->update([
            "quantity" => $category->products()->sum("quantity")
        ]);
    }
}
