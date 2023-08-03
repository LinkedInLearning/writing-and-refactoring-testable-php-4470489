<?php

declare( strict_types=1 );

function add( int $x, int $y ) :int {
  return $x+$y; 
}

function multiply( int $x, int $y ) :int {
  // do it with the add function
  $result = 0;
  for( $i = 1; $i < $y; $i++ ) {
    $result = add( $result, $x );
  }

  return $result;
}

echo add( 5, 2 );
echo multiply( 5, -2 );