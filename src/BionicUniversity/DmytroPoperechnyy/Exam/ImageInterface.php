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
     * @param $image
     * @return mixed
     */
    public function getHeight($image);

    /**
     * @param $image
     * @return mixed
     */
    public function getWidth($image);
}