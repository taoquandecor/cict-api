<?php

namespace History\Helpers;

class ArrayComparator
{
    /**
     * @param array $arr1
     * @param array $arr2
     * @return array
     */
    public static function Diff(array $arr1, array $arr2)
    {
        try {
            $diff = [];
            $keys = array_keys($arr1);

            foreach ($keys as $key) {
                $oldValue = $arr1[$key];
                $newValue = $arr2[$key];

                if ($oldValue != $newValue) {
                    $diff[$key] = [
                        'OldValue' => $oldValue,
                        'NewValue' => $newValue
                    ];
                }
            }

            return $diff;
        } catch (\Exception $ex) {
            return [];
        }
    }
}
