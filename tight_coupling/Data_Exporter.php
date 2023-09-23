<?php
declare(strict_types=1);


namespace tight_coupling;

class Data_Exporter
{
    public function export( array $products, Builder $builder ) {
        $builder->build( $products );
    }
}
