<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/14/14
 * Time: 8:48 PM
 */

namespace Exam;


class ImageResizer extends AbstractResizer implements ImageInterface
{
    private $image;
    private $imageResized;

    const WIDTH = 150;
    const HEIGHT = 150;

    public function __construct($fileName)
    {
        $this->image = $this->openImage($fileName);
    }

    protected function openImage($fileName)
    {
        //works only with .jpeg extensions
        $image = @imagecreatefromjpeg($fileName);

        if ($image) {
            //create black image
            $image = imagecreatetruecolor(150, 150);
            $bgc = imagecolorallocate($image, 255, 255, 255);
            $tc  = imagecolorallocate($image, 0, 0, 0);

            imagefilledrectangle($image, 0, 0, 150, 150, $bgc);
        }
        return $image;
    }

    public function getWidth($image)
    {
        list($width) = getimagesize($image);
        return $width;
    }

    public function getHeight($image)
    {
        list($height) = getimagesize($image);
        return $height;
    }

    public function thumbnail($image)
    {
        $width = $this->getWidth($image);
        $height = $this->getHeight($image);

        //find center
        $cropStartX = ($width / 2) - (self::WIDTH / 2);
        $cropStartY = ($height / 2) - (self::HEIGHT / 2);

        $this->image = imagecreatetruecolor(self::WIDTH, self::HEIGHT);
        $this->image = imagecopyresampled($this->image, $this->imageResized,
            0, 0, 0, 0, )

    }
}
