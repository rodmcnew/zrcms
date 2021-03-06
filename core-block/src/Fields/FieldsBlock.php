<?php

namespace Zrcms\CoreBlock\Fields;

use Zrcms\Core\Fields\FieldsContent;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class FieldsBlock extends FieldsContent
{
    // required
    const CONTAINER_VERSION_ID = 'containerVersionId';
    const BLOCK_COMPONENT_NAME = 'blockComponentName';
    const CONFIG = 'config';

    // client layout required
    const LAYOUT_PROPERTIES = 'layoutProperties';
    const LAYOUT_PROPERTIES_RENDER_ORDER = 'renderOrder';
    const LAYOUT_PROPERTIES_ROW_NUMBER = 'rowNumber';
    const LAYOUT_PROPERTIES_COLUMN_CLASS = 'columnClass';

    // render data properties
    const RENDER_DATA_ID = 'id';
    const RENDER_DATA_CONFIG = 'config';
    const RENDER_DATA_DATA = 'data';
}
