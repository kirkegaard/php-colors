#!/usr/bin/env php
<?php

require 'library/Colors.php';

// you can create an instance if thats what you want
$c = new Colors();
print $c->red('Hello') . "\n";
print $c->red('World', 'yellow') . "\n";

// or use the static calls
print Colors::green('In static', 'black') . "\n";
