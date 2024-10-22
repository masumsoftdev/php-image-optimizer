<?php

namespace MasumPackagist\ImageOptimizer;

class Optimizer
{
    protected $quality = 75; // Default quality for compression (75 out of 100)

    public function __construct($quality = 75)
    {
        $this->quality = $quality;
    }

    /**
     * Optimize image by compressing and resizing
     *
     * @param string $source Path to the source image
     * @param string $destination Path to save the optimized image
     * @param int|null $newWidth Optional new width for resizing (height will be calculated to keep aspect ratio)
     * @return bool True on success, False on failure
     */
    public function optimize($source, $destination, $newWidth = null)
    {
        // Get image info
        $info = getimagesize($source);
        $mime = $info['mime'];

        // Create image resource from source
        switch ($mime) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source);
                break;
            case 'image/png':
                $image = imagecreatefrompng($source);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($source);
                break;
            default:
                throw new \Exception('Unsupported image type.');
        }

        // Resize if new width is provided
        if ($newWidth !== null) {
            $image = $this->resize($image, $newWidth, $info[0], $info[1]);
        }

        // Save the image
        $result = $this->saveImage($image, $destination, $mime);

        // Free up memory
        imagedestroy($image);

        return $result;
    }

    /**
     * Resize image to a new width while keeping aspect ratio
     *
     * @param resource $image
     * @param int $newWidth
     * @param int $oldWidth
     * @param int $oldHeight
     * @return resource
     */
    protected function resize($image, $newWidth, $oldWidth, $oldHeight)
    {
        $newHeight = ($newWidth / $oldWidth) * $oldHeight;
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight);
        return $newImage;
    }

    /**
     * Save the image to a file with compression
     *
     * @param resource $image
     * @param string $destination
     * @param string $mime
     * @return bool
     */
    protected function saveImage($image, $destination, $mime)
    {
        switch ($mime) {
            case 'image/jpeg':
                return imagejpeg($image, $destination, $this->quality);
            case 'image/png':
                // PNG quality is 0 (best) to 9 (worst), so we reverse the scale
                return imagepng($image, $destination, round(9 - ($this->quality / 10)));
            case 'image/gif':
                return imagegif($image, $destination);
            default:
                throw new \Exception('Unsupported image type.');
        }
    }
}
