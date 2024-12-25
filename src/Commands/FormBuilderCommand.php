<?php

namespace CupCode\FormBuilder\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class FormBuilderCommand extends Command
{
    public $signature = 'cupcode:formbuilder';

    public $description = 'Install cupcode vilt stack form builder';

    public function handle(): int
    {

        $this->jsFile();
        $this->tailwindFile();
        $this->overwriteAppCss();




        return self::SUCCESS;
    }


    private function jsFile()
    {
        // Define source and destination paths
        $sourcePath = base_path('vendor/cupcode/formbuilder/resources/js');
        $destinationPath = resource_path('js');

        // Check if source directory exists
        if (File::exists($sourcePath)) {
            // Get all files and directories inside the source directory
            $filesAndDirs = File::allFiles($sourcePath);

            foreach ($filesAndDirs as $file) {
                // Copy each file to the destination
                $destination = $destinationPath . DIRECTORY_SEPARATOR . $file->getRelativePathname();

                // Ensure the destination directory exists before copying the file
                File::ensureDirectoryExists(dirname($destination));
                File::copy($file->getPathname(), $destination);
            }

            $this->info('JS files published successfully!');
        } else {
            $this->error('Source directory does not exist.');
        }
    }

    private function tailwindFile()
    {
        $sourcePath = base_path('vendor/cupcode/formbuilder/tailwind.config.js');
        $destinationPath = base_path('tailwind.config.js');

        // Check if source file exists
        if (File::exists($sourcePath)) {
            // Copy the file to the main project directory
            File::copy($sourcePath, $destinationPath);

            $this->info('Tailwind config file published successfully!');
        } else {
            $this->error('Tailwind config file not found in the package.');
        }
    }

    private function overwriteAppCss()
    {
        $sourcePath = base_path('vendor/cupcode/formbuilder/resources/css/app.css');
        $destinationPath = resource_path('css/app.css');

        // Use the relative path for the @import statement
        $importStatement = "@import '" . 'vendor/cupcode/formbuilder/resources/css/app.css' . "';" . PHP_EOL;

        if (file_exists($sourcePath)) {
            // Get the current content of app.css
            $currentContent = file_exists($destinationPath) ? file_get_contents($destinationPath) : '';

            // Check if the import statement is already present
            if (strpos($currentContent, $importStatement) === false) {
                // Prepend the import statement
                $newContent = $importStatement . $currentContent;
                file_put_contents($destinationPath, $newContent);
            }
        }
    }
}
