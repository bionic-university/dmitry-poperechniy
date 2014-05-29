<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/14/14
 * Time: 8:48 PM
 */

namespace BionicUniversity\DmytroPoperechnyy\Exam;

/**
 * Class ImageResizer
 * @package BionicUniversity\DmytroPoperechnyy\Exam
 */
class ImageResizer implements ImageInterface
{
    const THUMBWIDTH = 100;

    /**
     * @var string
     */
    protected $fileName;

    /**
     * @var string
     */
    protected $src;

    /**
     * @var int
     */
    protected $oldWidth;

    /**
     * @var int
     */
    protected $oldHeight;

    /**
     * @param $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @param $fileName
     */
    public function createSource($fileName){
        $this->src = imagecreatefromjpeg($fileName);
    }

    /**
     * @param $fileName
     * @return mixed|void
     */
    public function getWidth($fileName)
    {
        $this->oldWidth = imagesx($fileName);
    }

    /**
     * @param $fileName
     * @return mixed|void
     */
    public function getHeight($fileName)
    {
        $this->oldHeight = imagesy($fileName);
    }

    /**
     * @param $width
     * @param $height
     * @return array
     */
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

    /**
     * @param $src
     * @param $oldWidth
     * @param $oldHeight
     * @param $newWidth
     * @param $newHeight
     * @return bool
     */
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









