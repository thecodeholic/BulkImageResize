<?php

namespace tc\bulkimageresize;

class ImageResize
{
    public $imagine;
    /**
     * Extensions to check each file agains before trying to resize
     */
    private $extensions = ['jpg', 'png', 'jpeg', 'gif'];

    /**
     * The image width which will be used to create thumbnails
     */
    private $imageWidth = 200; 

    public function __construct($imageWidth = null, $extensions = null)
    {
        $this->imagine = new \Imagine\Gd\Imagine();
        if ($imageWidth !== null){
            $this->imageWidth = $imageWidth;
        }
        if ($extensions !== null) {
            $this->extensions = $extensions;
        }
    }

    public function resizeAllImages($dir)
    {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
                // Resize image
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                if (in_array($ext, $this->extensions)) {
                    $this->imagine->open($path)
                        ->thumbnail(new \Imagine\Image\Box($this->imageWidth, $this->imageWidth))
                        ->save($path);
                }
            } else if ($value != "." && $value != "..") {
                $this->resizeAllImages($path);
            }
        }
    }
}