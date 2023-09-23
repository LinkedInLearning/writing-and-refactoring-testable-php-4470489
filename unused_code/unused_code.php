<?php
declare(strict_types=1);

function find_product( array $products, string $name ) :?Product {
    
//    This is how we used to do it, but now we can just return the product directly.
//    Retaining in case we need it again.
//    $return_product = null;
//
//    foreach( $products as $product ) {
//        if( $product->getName() === $name ) {
//            $return_product = $product;
//        }
//    }
//    return $return_product;
    
    foreach( $products as $product ) {
        if( $product->getName() === $name ) {
            return $product;
        }
    }
    
    return null;
}

function is_weekend() {
    $day_of_the_week = date( 'l' );
    return in_array( $day_of_the_week, [ 'Saturday', 'Sunday' ] );
}
