<?php
declare( strict_types=1 );

use PHPUnit\Framework\TestCase;
use Project\Redirect\Collections\Nullable;

class Nullable_Test extends TestCase {

  public function setUp():void{
    require_once __DIR__ . '/../../vendor/autoload.php';
    parent::setUp();
  }

  public function test_instantiation() {
    $nullable = new Nullable();
    $this->assertInstanceOf( Nullable::class, $nullable );
  }
}