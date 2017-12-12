<?php

namespace Zrcms\CoreApplication\Api\Component;

use Zrcms\Core\Api\Component\SearchComponentList;
use Zrcms\Core\Model\Component;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class SearchComponentListBasic implements SearchComponentList
{
    /**
     * @param Component[] $components
     * @param array       $criteria
     *
     * @return array
     */
    public function __invoke(
        array $components,
        array $criteria = []
    ): array {
        $result = [];

        foreach ($components as $component) {
            if ($this->filter($component, $criteria)) {
                $result[] = $component;
            }
        }

        return $result;
    }

    /**
     * filter
     *
     * @param Component $component
     * @param array     $criteria
     *
     * @return bool
     */
    protected function filter(
        Component $component,
        array $criteria = []
    ) {
        $count = count($criteria);
        $default = new \stdClass();
        $countResult = 0;
        foreach ($criteria as $key => $value) {
            $method = 'get' . ucfirst($key);
            if (method_exists($component, $method)) {
                // Try to get property if has method
                $componentValue = $component->$method();
            } else {
                // Try to get property from properties
                $componentValue = $component->findProperty($key, $default);
            }

            if ($componentValue === $value) {
                $countResult++;
            }
        }

        return ($countResult === $count);
    }
}
