<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
   //*@test */
    public function a_product_can_be_created ()
    {
        $this-> withoutExceptionHandling();

        $response = $this-> post('products',
        [
            'product_name'=> 'pasta deli',
            'brand'=> 'doria',
            'model'=> 'casi nuevo ',
        ]);
        $response->assertOk();
        $this->assertCount(4, Products::all());

        $products = Product :: first();

        $this->assertEquals($products -> product_name, 'pasta deli' );
        $this->assertEquals($products -> brand, 'doria' );
        $this->assertEquals($products -> model, 'casi nuevo' );
    }
}

