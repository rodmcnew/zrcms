<?php

namespace Zrcms\HttpApiFields;

use Zrcms\HttpApiFields\Acl\HttpApiIsAllowedApiFindFieldsByModel;
use Zrcms\HttpApiFields\Field\HttpApiFindFieldsByModel;
use Zrcms\HttpApiFields\Field\HttpApiFindFieldTypes;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModuleConfigRoutes
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'routes' => [
                'zrcms.api.fields.model.{field-rat-fields-model}' => [
                    'name' => 'zrcms.api.fields.model.{field-rat-fields-model}',
                    'path' => '/zrcms/api/fields/model/{field-rat-fields-model}',
                    'middleware' => [
                        'acl' => HttpApiIsAllowedApiFindFieldsByModel::class,
                        'api' => HttpApiFindFieldsByModel::class,
                    ],
                    'options' => [],
                    'allowed_methods' => ['GET'],
                    'swagger' => [
                        'get' => [
                            'description' => 'List field definitions for a model (I.E. site-version, block-component, etc..)',
                            'produces' => [
                                'application/json',
                            ],
                            'parameters' => [
                                [
                                    'name' => 'field-rat-fields-model',
                                    'in' => 'path',
                                    'description' => 'ZRCMS field model (I.E. site-version, block-component, etc..)',
                                    'required' => true,
                                    'type' => 'string',
                                    'format' => 'string',
                                ]
                            ],
                            'responses' => [
                                'default' => [
                                    '$ref' => '#/definitions/ZrcmsJsonResponse'
                                ],
                            ],
                        ],
                    ],
                ],
                'zrcms.api.fields.types' => [
                    'name' => 'zrcms.api.fields.types',
                    'path' => '/zrcms/api/fields/types',
                    'middleware' => [
                        'acl' => HttpApiIsAllowedApiFindFieldsByModel::class,
                        'api' => HttpApiFindFieldTypes::class,
                    ],
                    'options' => [],
                    'allowed_methods' => ['GET'],
                    'swagger' => [
                        'get' => [
                            'description' => 'List field types',
                            'produces' => [
                                'application/json',
                            ],
                            'parameters' => [],
                            'responses' => [
                                'default' => [
                                    '$ref' => '#/definitions/ZrcmsJsonResponse'
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
