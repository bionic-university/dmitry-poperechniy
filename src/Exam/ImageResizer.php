<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/14/14
 * Time: 8:48 PM
 */

namespace Exam;

include_once('ImageInterface.php');

class ImageResizer implements ImageInterface
{
    const tWidth = 100;

    protected $fileName;
    protected $height;
    protected $width;

    //protected $supportedExts = ['gif','jpg','jpeg','png'];

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        $this->width = $this->getWidth($fileName);
        $this->height = $this->getHeight($fileName);
    }

    public function imageCreate($fileName){
        $im = imagecreatefromjpeg($fileName);
        return $im;
    }

    public function getWidth($fileName)
    {
        return imagesx($fileName);
    }

    public function getHeight($fileName)
    {
        return imagesy($fileName);
    }

    public function HorizontalVertical(){
        /* Calculate the New Image Dimensions */
        if( $this->height > $this->width ) {
            /* Portrait */
            $newWidth = self::tWidth;
            $newHeight = $this->height * ( self::tWidth / $newWidth );
        } else {
            /* Landscape */
            $newHeight = self::tWidth;
            $newWidth = $this->width * (self::tWidth / $newHeight );
        }
    }

}
header('Content-Type: image/jpeg');

$file = 'dinosaurs.jpg';
$image = new ImageResizer($file);
imagejpeg($image->imageCreate($image));
imagedestroy($image->imageCreate($image));










