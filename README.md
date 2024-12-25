
# Uganoga - JavaScript Obfuscator for Laravel Projects

Uganoga is a lightweight and efficient package for obfuscating JavaScript files in Laravel projects. It provides an easy-to-use Artisan command to obfuscate your JavaScript files and save them in a designated output directory. This is "ideal" for enhancing the security of your front-end code. Worked for me and few other devs, not sure if it'll work for you. uganoga.

---

## Features

- Obfuscates JavaScript files by encoding them.
- Configurable input and output paths for flexibility.
- Integrates seamlessly with Laravel.
- Simple and straightforward (hopefully) Artisan command for execution.

---

## Installation

### Via Composer

To install the package, use Composer:

```bash
composer require uganoga/uganoga
```

---

## Configuration

### Publishing Configuration

After installation, publish the configuration file:

```bash
php artisan vendor:publish --tag=config
```

This will create a `config/uganoga.php` file where you can specify the input paths for your JavaScript files and the output path for the obfuscated files.

### Default Configuration

The default configuration file looks like this:

```php
return [
    'input_paths' => [
        base_path('resources/js'), // Input directory for JavaScript files
    ],
    'output_path' => public_path('js'), // Output directory for obfuscated files
];
```

You can modify this file to match your project's requirements.

---

## Usage

### Add JavaScript Files

Ensure your JavaScript files are located in the input paths specified in the configuration file (e.g., `resources/js`).

For example, create a sample JavaScript file:

```bash
mkdir -p resources/js
echo "console.log('Hello, Uganoga!');" > resources/js/example.js
```

### Run the Obfuscation Command

To obfuscate the JavaScript files, run the following Artisan command:

```bash
php artisan uganoga:obfuscate
```

This command will:
1. Read all JavaScript files from the configured `input_paths`.
2. Obfuscate the content.
3. Save the obfuscated files to the configured `output_path`.

### Output

After running the command, you will find the obfuscated JavaScript files in the `public/js` directory (or your configured output path).

Example of an obfuscated file:

```javascript
eval(atob('Y29uc29sZS5sb2coIkhlbGxvLCBVZ2Fub2dhISIpOw=='));
```

---

## Testing

### Serve Your Laravel Application

Start the Laravel development server:

```bash
php artisan serve
```

Access your obfuscated file:

```
http://127.0.0.1:8000/js/example.js
```

### Validate Obfuscation

Verify that the file served is obfuscated and still functional.

---

## Advanced Usage

### Custom Configuration

You can specify multiple input paths or change the output directory by editing the `config/uganoga.php` file:

```php
return [
    'input_paths' => [
        base_path('resources/js'),
        base_path('custom/js'),
    ],
    'output_path' => public_path('secure-js'),
];
```

---

## Development

### Local Testing

If you are testing the package locally before publishing:

1. Add a path repository to your Laravel project’s `composer.json`:

```json
"repositories": [
    {
        "type": "path",
        "url": "../uganoga"
    }
]
```

2. Require the package:

```bash
composer require uganoga/uganoga:dev-main
```

---

## Contributing

Contributions are welcome! If you encounter any issues or have feature requests, well, that's not my problem :D

---

## License

Do whatever you want to do...

---

## Acknowledgements

- None.
