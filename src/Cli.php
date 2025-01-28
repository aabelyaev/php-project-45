<?php

namespace Project\Cli;

class Cli {
    public function greet()
    {
        echo "Welcome to the Brain Games!\n";
        $name = trim(fgets(STDIN));
        echo "Hello, $name!\n";
    }
}