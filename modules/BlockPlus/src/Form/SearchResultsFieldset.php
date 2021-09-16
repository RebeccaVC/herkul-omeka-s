<?php declare(strict_types=1);
namespace BlockPlus\Form;

use BlockPlus\Form\Element\TemplateSelect;
use Laminas\Form\Element;
use Laminas\Form\Fieldset;
use Omeka\Form\Element\PropertySelect;
use Omeka\Form\Element\ResourceTemplateSelect;

class SearchResultsFieldset extends Fieldset
{
    public function init(): void
    {
        $this
            ->add([
                'name' => 'o:block[__blockIndex__][o:data][heading]',
                'type' => Element\Text::class,
                'options' => [
                    'label' => 'Block title', // @translate
                    'info' => 'Heading for the block, if any.', // @translate
                ],
                'attributes' => [
                    'id' => 'browse-preview-heading',
                ],
            ])
            ->add([
                'name' => 'o:block[__blockIndex__][o:data][resource_type]',
                'type' => Element\Select::class,
                'options' => [
                    'label' => 'Resource type', // @translate
                    'value_options' => [
                        'items' => 'Items', // @translate
                        'item_sets' => 'Item sets', // @translate
                        'media' => 'Media', // @translate
                    ],
                ],
                'attributes' => [
                    'id' => 'browse-preview-resource-type',
                    'class' => 'chosen-select',
                ],
            ])
            ->add([
                'name' => 'o:block[__blockIndex__][o:data][query]',
                'type' => Element\Text::class,
                'options' => [
                    'label' => 'Query', // @translate
                    'info' => 'Used to restrict resources, for example on an item set. Let empty for none, use "=" for any resource in the site.', // @translate
                    'documentation' => 'https://omeka.org/s/docs/user-manual/sites/site_pages/#browse-preview',
                ],
                'attributes' => [
                    'id' => 'browse-preview-query',
                ],
            ])
            ->add([
                'name' => 'o:block[__blockIndex__][o:data][limit]',
                'type' => Element\Number::class,
                'options' => [
                    'label' => 'Limit', // @translate
                    'info' => 'Maximum number of resources to display in the preview.', // @translate
                ],
                'attributes' => [
                    'id' => 'browse-preview-limit',
                ],
            ])
            ->add([
                'name' => 'o:block[__blockIndex__][o:data][pagination]',
                'type' => Element\Checkbox::class,
                'options' => [
                    'label' => 'Pagination', // @translate
                    'info' => 'Show pagination to browse all resources on the same page.', // @translate
                ],
                'attributes' => [
                    'id' => 'browse-preview-pagination',
                ],
            ])
            ->add([
                'name' => 'o:block[__blockIndex__][o:data][sort_headings]',
                'type' => PropertySelect::class,
                'options' => [
                    'label' => 'Sort headings', // @translate
                    'info' => 'Display sort links for the list of results.', // @translate
                    'term_as_value' => true,
                    'prepend_value_options' => [
                        'created' => 'Created', // @translate
                        'resource_class_label' => 'Resource class', // @translate
                    ],
                ],
                'attributes' => [
                    'id' => 'browse-preview-sort-headings',
                    'class' => 'chosen-select',
                    'multiple' => true,
                    'data-placeholder' => 'Select properties', // @translate
                ],
            ])
            ->add([
                'name' => 'o:block[__blockIndex__][o:data][resource_template]',
                'type' => ResourceTemplateSelect::class,
                'options' => [
                    'label' => 'Resource template for sort headings', // @translate
                    'info' => 'If set, the alternative labels of this resource template will be used to display the sort headings.', // @translate
                    'empty_option' => '',
                ],
                'attributes' => [
                    'id' => 'browse-preview-resource-template',
                    'class' => 'chosen-select',
                    'multiple' => false,
                    'data-placeholder' => 'Select resource template…', // @translate
                ],
            ])
            ->add([
                'name' => 'o:block[__blockIndex__][o:data][template]',
                'type' => TemplateSelect::class,
                'options' => [
                    'label' => 'Template to display', // @translate
                    'info' => 'Templates are in folder "common/block-layout" of the theme and should start with "search-results".', // @translate
                    'template' => 'common/block-layout/search-results',
                ],
                'attributes' => [
                    'id' => 'browse-preview-template',
                    'class' => 'chosen-select',
                ],
            ])
        ;
    }
}