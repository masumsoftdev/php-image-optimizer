
# PHP Image Optimizer

A simple PHP package for resizing and compressing images. Supports JPEG, PNG, and GIF.

## Installation

Install the package via Composer:

```bash
composer require masum-packagist/php-image-optimizer
```

## Usage

### Basic Usage
You can optimize and resize an image with just a few lines of code:

```php
use MasumPackagist\ImageOptimizer\Optimizer;

// Instantiate the optimizer with a quality setting (1-100, where 100 is best quality)
$optimizer = new Optimizer(85);

// Optimize an image by resizing to a max width of 800px and compressing it
$optimizer->optimize('/path/to/source.jpg', '/path/to/optimized.jpg', 800);
```

### Parameters
- **Source**: Path to the original image file.
- **Destination**: Path where the optimized image will be saved.
- **New Width** (optional): Resize the image to this width, keeping the aspect ratio intact.

### Image Format Support
- **JPEG**: Compressed with the provided quality value.
- **PNG**: Compressed with a reversed quality scale (0-9).
- **GIF**: Compression is minimal due to format limitations.

## Versioning

This package follows [Semantic Versioning](https://semver.org/).
The current version is **v1.0.0**.

## Features
- **Resize images**: Automatically resize while maintaining aspect ratio.
- **Compress images**: Lossy compression for JPEG and PNG formats.
- **Supported formats**: JPEG, PNG, GIF.

## Changelog

### v1.0.0
- Initial release with support for:
  - Image resizing.
  - Compression for JPEG, PNG, and GIF formats.

## Contributing

If you want to contribute to this project:
1. Fork the repository.
2. Create your feature branch (`git checkout -b feature/your-feature`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Create a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](https://opensource.org/licenses/MIT) file for details.

