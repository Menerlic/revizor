<?php

/**
 * field_group.inc
 * Handle rendering fieldgroups as panes.
 */
$plugin = array(
  'title' => t('Full node'),
  'category' => t('Field Group'),
  'required context' => new ctools_context_required(t('node'), 'node'),
);

/**
 * Render a field_group as pane.
 */
function field_group_field_group_full_node_content_type_render($subtype, $conf, $panel_args, $context) {

  $view_mode = 'form';

  $node = node_view($context->data, $view_mode);

  field_group_attach_groups($node, $view_mode);
  field_group_build_entity_groups($node, $view_mode);

  if (isset($node)) {
    $block = new StdClass();
    $block->content = drupal_render($node);
  }

  return $block;
}

function field_group_field_group_full_node_content_type_edit_form($form, &$form_state) {
  return $form;
}

function field_group_field_group_full_node_content_type_edit_form_submit($form, &$form_state) {

}
