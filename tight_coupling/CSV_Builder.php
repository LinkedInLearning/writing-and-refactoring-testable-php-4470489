<?php
declare(strict_types=1);


namespace tight_coupling;

class CSV_Builder
{
    public function build( array $products ) {
        $csv = '';
        foreach( $products as $product ) {
            $csv .= $product->getName() . ',' . $product->getPrice() . "\n";
        }
        file_put_contents( 'products.csv', $csv );
    }
}
