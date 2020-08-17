<?php
function demo_component(){
	$el_demo = new \Abs\Demo();
	$el_demo->data['test'] = 'variables passed through the data prop';
	?>

	<div>
		<h1>Here is a demo component.</h1>
		<p>
			Components are used to create repeatable sections or blocks of code that you can add to templates very easily.
		</p>
		<p>
			All components are intended to be simple functions containing escaped markup and template logic. There is no Base class or other structure provided on purpose to allow for maximum flexibility.
		</p>
		<p>
			Components are modular and are designed to include elements you have created within them.
		</p>
		<p>Here is an example element <?= $el_demo->instance(); ?></p>
		<p>Elements are PHP Child Classes that extend a Base Element Class</p>
		<p>They are loosely inspired by the way VueJS handles components.</p>
		<p>Each Component will have three methods in which you can add code.</p>
		<ul>
			<li>template()</li>
			<li>script()</li>
			<li>style()</li>
		</ul>
		<p>After defining the methods, you can create an instance of your new element and render an instance with the method instance()</p>
		<p>This creates a structured way to create UI elements for use in your components or templates directly</p>
	</div>

	<?php
}
