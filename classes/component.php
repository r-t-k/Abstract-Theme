<?php


namespace Abs;


abstract class component {
	public $state;
	private $id;
	public $root_classes = '';

	function __construct() {
		$rand     = mt_rand();
		$pre      = 'abs_com_';
		$this->id = $pre . $rand;

	}

	abstract function template();

	abstract function script();

	abstract function style();

	private function render() {
		$this->template();
		$this->script();
		$this->style();
	}

	public function get_id() {
		return $this->id;
	}

	public function id() {
		echo '#' . $this->id;
	}

	public function instance() {
		?>
		<div id="<?= $this->id ?>" class="<?= $this->root_classes ?>">
			<?php $this->render(); ?>
		</div>
		<?php
	}

}
