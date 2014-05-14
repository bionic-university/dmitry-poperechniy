<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/14/14
 * Time: 8:47 PM
 */

namespace Exam;


interface ImageInterface
{

    public function getHeight($image);

    public function getWidth($image);
}