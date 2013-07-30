<?php
/*

HEAVILY MODIFIED DAUX.IO! /jp

Daux.io
==================

Description
-----------

This is a tool for auto-generating documentation based on markdown files
located in the /docs folder of the project. To see all of the available
options and to read more about how to use the generator, visit:

http://daux.io


Author
------
Justin Walsh (Todaymade): justin@todaymade.com, @justin_walsh
Garrett Moon (Todaymade): garrett@todaymade.com, @garrett_moon


Feedback & Suggestions
----

To give us feedback or to suggest an idea, please create an request on the the
Github issue tracker:

https://github.com/justinwalsh/daux.io/issues

Bugs
----

To file bug reports please create an issue using the github issue tracker:

https://github.com/justinwalsh/daux.io/issues


Copyright and License
---------------------
Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are
met:

*	Redistributions of source code must retain the above copyright notice,
	this list of conditions and the following disclaimer.

*	Redistributions in binary form must reproduce the above copyright
	notice, this list of conditions and the following disclaimer in the
	documentation and/or other materials provided with the distribution.

This software is provided by the copyright holders and contributors "as
is" and any express or implied warranties, including, but not limited
to, the implied warranties of merchantability and fitness for a
particular purpose are disclaimed. In no event shall the copyright owner
or contributors be liable for any direct, indirect, incidental, special,
exemplary, or consequential damages (including, but not limited to,
procurement of substitute goods or services; loss of use, data, or
profits; or business interruption) however caused and on any theory of
liability, whether in contract, strict liability, or tort (including
negligence or otherwise) arising in any way out of the use of this
software, even if advised of the possibility of such damage.

*/

require_once('libs/functions.php');

$options = get_options();
$tree = get_tree("../content");
array_unshift($tree, array( // Add intro link to navbar
	'type' => 'file',
	'name' => 'Welcome',
	'title' => 'Welcome',
	'path' => '../content/index.md',
	'clean' => false,
	'url' => '/'
));
$homepage_url = homepage_url($tree);
$docs_url = docs_url($tree);

// Redirect to docs, if there is no homepage
if ($homepage && $homepage_url !== '/') {
	header('Location: '.$homepage_url);
}

?>
<!doctype html>
<html>
<head>
	<title><?php echo $options['title']; ?></title>

	<meta charset="utf-8" />

	<link rel="icon" href="/img/favicon.png" type="image/x-icon">

	<!-- CSS -->
	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/css/main.css">

</head>
<body>

	<a href="https://github.com/you"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>

	<nav>
		<a class="brand" href="<?php echo $homepage_url;?>">
			<?php echo $options['title']; ?>
		</a>
		<?php echo build_nav($tree); ?>
	</nav>
	<div class="content">
		<article>
			<?php echo load_page($tree); ?>
		</article>
	</div>
</body>
</html>