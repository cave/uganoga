<?php

namespace Uganoga;

class Obfuscator
{
    public static function obfuscate(array $inputPaths, string $outputPath): void
    {
        if (!is_dir($outputPath)) {
            mkdir($outputPath, 0755, true);
        }

        foreach ($inputPaths as $path) {
            $files = is_dir($path) ? glob($path . '/*.js') : [$path];

            foreach ($files as $file) {
                if (is_file($file)) {
                    $content = file_get_contents($file);
                    $obfuscated = base64_encode($content);
                    $outputFile = $outputPath . '/' . basename($file);
                    file_put_contents($outputFile, "eval(atob('" . $obfuscated . "'));");
                }
            }
        }
    }
}
