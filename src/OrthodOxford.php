<?php
/**
 * File OrthodOxford.php
 *
 * @author Douglas Linsmeyer <douglas.linsmeyer@nerdery.com>
 */

namespace DLinsmeyer\OrthodOxford;

/**
 * Class OrthodOxford
 *
 * @author Douglas Linsmeyer <douglas.linsmeyer@nerdery.com>
 */
class OrthodOxford
{
    /**
     * Formats a string to use Oxford commas
     *
     * E.g. The quick brown fox jumped over the tree, the bird, and the fence.
     *
     * @param string $input
     *
     * @return string
     */
    public function right($input)
    {
        $matches = [];
        $matchFound = preg_match_all('/, (.*) and/U', $input, $matches);
        if ($matchFound) {
            foreach ($matches[1] as $match) {
                $input = str_replace($match, $match . ',', $input);
            }
        }

        return $input;
    }

    /**
     * Formats a string to not use Oxford commas
     *
     * E.g. The quick brown fox jumped over the tree, the bird and the fence.
     *
     * @param string $input
     *
     * @return string
     */
    public function wrong($input)
    {
        $matches = [];
        $matchFound = preg_match_all('/, (.*,) and/U', $input, $matches);
        if ($matchFound) {
            foreach ($matches[1] as $match) {
                $input = str_replace($match, substr($match, 0, -1), $input);
            }
        }

        return $input;
    }
}
