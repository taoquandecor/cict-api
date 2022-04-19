<?php
namespace History\Helpers;

use ReflectionObject;
use InvalidArgumentException;

class ObjectComparator
{
    /**
     * Compare 2 objects
     *
     * @param $o1
     * @param $o2
     * @param bool $strict compare in simple (==) or in strict way (===)
     * @return true objects are equals, false objects are different
     */
    public static function Equal($o1, $o2, $strict = false)
    {
        return $strict ? $o1 === $o2 : $o1 == $o2;
    }

    /**
     * @param $o1
     * @param $o2
     * @return array
     * @throws \ReflectionException
     */
    public static function Diff($o1, $o2)
    {
        if (!is_object($o1) || !is_object($o2)) {
            throw new InvalidArgumentException("Parameters should be of object type!");
        }

        $diff = [];
//        if (get_class($o1) == get_class($o2)) {
            $o1Properties = (new ReflectionObject($o1))->getProperties();
            $o2Reflected = new ReflectionObject($o2);

            foreach ($o1Properties as $o1Property) {;
                $o2Property = $o2Reflected->getProperty($o1Property->getName());
                // Mark private properties as accessible only for reflected class
                $o1Property->setAccessible(true);
                $o2Property->setAccessible(true);
                $oldValue = $o1Property->getValue($o1);
                $newValue = $o2Property->getValue($o2);
                if ($oldValue != $newValue) {
                    $diff[$o1Property->getName()] = [
                        'OldValue' => $oldValue,
                        'NewValue' => $newValue
                    ];
                }
            }
//        }
        return $diff;
    }
}
