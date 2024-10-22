<?php

use PHPUnit\Framework\TestCase;
use MasumPackagist\ImageOptimizer\Optimizer;

class OptimizerTest extends TestCase
{
    public function testImageOptimization()
    {
        $optimizer = new Optimizer(85);

        // Path to the test image
        $source = __DIR__ . '/test-image.jpg';
        $destination = __DIR__ . '/test-optimized.jpg';

        // Optimize the image
        $result = $optimizer->optimize($source, $destination, 800);

        // Assert that optimization was successful
        $this->assertTrue($result);
        $this->assertFileExists($destination);

        // Cleanup
        unlink($destination);
    }
}
