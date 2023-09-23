<?php
declare(strict_types=1);


namespace tight_coupling;

class Data_Exporter
{
    public function export( array $products ) {
        $csv_builder = new CSV_Builder();
        $csv_builder->build( $products );
    }
}
