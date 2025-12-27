<?php

namespace App\Core;


class ConsoleTable
{
    public static function render(array $headers, array $rows): void
    {
        $widths = array_map('strlen', $headers);

        foreach ($rows as $row) {
            foreach ($row as $i => $cell) {
                $widths[$i] = max($widths[$i], strlen((string)$cell));
            }
        }

        $line = '+';
        foreach ($widths as $w) {
            $line .= str_repeat('-', $w + 2) . '+';
        }

        echo $line . PHP_EOL;
        echo '|';
        foreach ($headers as $i => $h) {
            echo ' ' . str_pad($h, $widths[$i]) . ' |';
        }
        echo PHP_EOL . $line . PHP_EOL;

        foreach ($rows as $row) {
            echo '|';
            foreach ($row as $i => $cell) {
                echo ' ' . str_pad($cell, $widths[$i]) . ' |';
            }
            echo PHP_EOL;
        }
        echo $line . PHP_EOL;
    }
}
