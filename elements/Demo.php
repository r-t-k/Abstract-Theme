<?php

namespace Abs;


class Demo extends element {
	function template() {
		?>
		<h1 id="demoH">this will change</h1>
		<h3><?= $this->data['test'] ?></h3>
		<?php
	}

	function script() {
		?>
		<script>
			document.querySelector('#demoH').textContent = 'DEMO ELEMENT';
		</script>
		<?php
	}

	function style() {
		?>
		<style>
			#demoH {
				color: red;
			}
		</style>
		<?php
	}
}

