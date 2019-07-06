<?php
class Pencil {   // 商品ID
	private $name; // メーカー
	private $price;
	private $clock;
	private $core;
	private $tdp; // 価格

	// コンストラクタ
	public function __construct($name, $price, $clock, $core, $tdp) {
		$this->name = $name;
		$this->price = $price;
		$this->clock = $clock;
		$this->core = $core;
		$this->tdp = $tdp;

	}

	// プロパティのデータを表示するメソッド
	public function printData() {
		echo "<tr>";
		echo "<td>". $this->name. "</td>";
		echo "<td>". $this->price. "</td>";
		echo "<td>". $this->clock. "</td>";
		echo "<td>". $this->core. "</td>";
		echo "<td>". $this->tdp. "</td>";
		echo "</tr>";
	}
}
?>
