<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/14/14
 * Time: 8:48 PM
 */

namespace BionicUniversity\DmytroPoperechnyy\Exam;

class ImageResizer implements ImageInterface
{
    const THUMBWIDTH = 100;

    protected $fileName;
    protected $src;
    protected $oldWidth;
    protected $oldHeight;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function createSource($fileName){
        $this->src = imagecreatefromjpeg($fileName);
    }

    public function getWidth($fileName)
    {
        $this->oldWidth = imagesx($fileName);
    }

    public function getHeight($fileName)
    {
        $this->oldHeight = imagesy($fileName);
    }

    public function HorizontalVertical($width, $height){
        if( $height > $width ) {
            /* Portrait */
            $newWidth = self::THUMBWIDTH;
            $newHeight = $height * ( self::THUMBWIDTH / $newWidth );
        } else {
            /* Landscape */
            $newHeight = self::THUMBWIDTH;
            $newWidth = $width * (self::THUMBWIDTH / $newHeight );
        }
        return [$newWidth, $newHeight];
    }

    public function imageCreate($src, $oldWidth, $oldHeight, $newWidth, $newHeight)
    {
        $new = imagecreatetruecolor(self::THUMBWIDTH, self::THUMBWIDTH);
        imagecopyresampled(
            $new, $src, 0, 0, ($newWidth - self::THUMBWIDTH)/2, ( $newHeight-self::THUMBWIDTH)/2,
            self::THUMBWIDTH, self::THUMBWIDTH, $oldWidth, $oldHeight
        );
        return imagejpeg($new , self::THUMBWIDTH);
    }
}

/**
header('Content-Type: image/jpeg');

$file = 'dinosaurs.jpg';
$image = new ImageResizer($file);
*/









