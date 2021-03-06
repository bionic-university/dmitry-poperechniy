<?php
/**
 * Created by PhpStorm.
 * User: transversus
 * Date: 5/14/14
 * Time: 8:46 PM
 */

namespace BionicUniversity\DmytroPoperechnyy\Exam;

/**
 * Class AbstractResizer
 * @package BionicUniversity\DmytroPoperechnyy\Exam
 */
abstract class AbstractResizer
{
    /**
     * @param string $image
     * @return mixed
     */
    abstract public function thumbnail($image);
} 