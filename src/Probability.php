<?php
namespace Rudak\FDG\Factory;


class Probability
{

    public static function success($percent)
    {
        $rand = rand(0, 100 * 10);

        return ($rand <= $percent * 10);
    }

    /**
     * @param      $options
     * 10-30 => 'foo'
     * 31-70 => 'bar'
     * @param null $defaultValue
     * @return null
     */
    public static function multiple($options, $defaultValue = null)
    {
        $randPercent = rand(0, 100);
        foreach ($options as $probability => $value) {
            $detail_prob = explode("-", $probability);
            if (isset($detail_prob[1])) {
                if (($detail_prob[0] <= $randPercent) && ($detail_prob[1] >= $randPercent)) {
                    return $value;
                }
                elseif ($probability === $randPercent) {
                    return $value;
                }
            }
        }

        return $defaultValue;
    }
}