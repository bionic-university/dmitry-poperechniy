<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/14/14
 * Time: 8:47 PM
 */

namespace BionicUniversity\DmytroPoperechnyy\Exam;

/**
 * Interface ImageInterface
 * @package BionicUniversity\DmytroPoperechnyy\Exam
 */
interface ImageInterface
{
    /**
     * @param string $image
     * @return mixed
     */
    public function getHeight($image);

    /**
     * @param string $image
     * @return mixed
     */
    public function getWidth($image);
}