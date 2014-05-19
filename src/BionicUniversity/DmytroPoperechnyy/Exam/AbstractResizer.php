<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/14/14
 * Time: 8:46 PM
 */

namespace BionicUniversity\DmytroPoperechnyy\Exam;


abstract class AbstractResizer
{
    /**
     * @param $image
     * @return mixed
     */
    abstract public function thumbnail($image);
} 