# Bulk Image resize
Using this package you can resize all images inside specific folder

## Usage
Put images inside `images` folder and run `php index.php` from the
project's root directory.

If you want to integrate this into your project use class ImageResize

```php
$resizer = new ImageResize();
$resizer->resizeAllImages('directory under which you want to resize');
```

### Options

```php
// The image width which will be used to create thumbnails
$imageWidth = 128;
// Extensions to check each file against before trying to resize
$extensions = ['jpg', 'png'];

$resizer = new ImageResize($imageWidth, $extensions);
$resizer->resizeAllImages('directory under which you want to resize');
```

### Events

```php
$resizer = new ImageResize($imageWidth, $extensions);

// Before resizing the image
$resizer->onBeforeResize(function($path){
    echo "Before resize " . $path . PHP_EOL;
});
// After resizing the image
$resizer->onAfterResize(function($path){
    echo "After resize " . $path . PHP_EOL;
});

$resizer->resizeAllImages('directory under which you want to resize');
```

### This project is part of the youtube video
