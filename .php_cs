<?php

$header = <<<'EOF'
This file is a part of MaintenanceBundle a touchdesign project.

(c) %s Christin Gruber

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src')
;

return PhpCsFixer\Config::create()
    ->setRules(array(
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'array_syntax' => ['syntax' => 'short'],
        'protected_to_private' => false,
        'semicolon_after_instruction' => false,
        'header_comment' => [
            'header' => sprintf($header, date('Y')),
        ]
    ))
    ->setRiskyAllowed(true)
    ->setFinder($finder)
;
