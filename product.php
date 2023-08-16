<?php
declare( strict_types=1 );

class Product {
	
	private int $stock = 0;
	
	public function getInventory() {
		return $this->stock;
	}
	
	public function addStock( int $stock ) {
		$this->stock += $stock;
	}
	
}
