<?php
/**
 * @file
 * Argument plugin which creates an entity context with bundle restriction.
 */

$plugin = array(
  'title' => t("Entity Panels Entity: ID"),
  'description' => t('Creates an entity context with bundle restriction from an entity ID argument.'),
  'context' => 'entity_panels_argument_entity_panels_entity_id_context',
  'get child' => 'entity_panels_argument_entity_panels_entity_id_get_child',
  'get children' => 'entity_panels_argument_entity_panels_entity_id_get_children',
  'default' => array(
    'entity_id' => '',
  ),
  'no ui' => TRUE,
);

function entity_panels_argument_entity_panels_entity_id_get_child($plugin, $parent, $child) {
  $plugins = entity_panels_argument_entity_panels_entity_id_get_children($plugin, $parent);
  return $plugins[$parent . ':' . $child];
}

function entity_panels_argument_entity_panels_entity_id_get_children($original_plugin, $parent) {
  $entities = entity_get_info();
  $plugins = array();

  foreach ($entities as $entity_type => $entity) {
    $plugin = $original_plugin;
    $plugin['keyword'] = $entity_type;
    $plugin['name'] = $parent . ':' . $entity_type;
    $plugin_id = $parent . ':' . $entity_type;
    $plugins[$plugin_id] = $plugin;
  }

  return $plugins;
}

function entity_panels_argument_entity_panels_entity_id_context($arg = NULL, $conf = NULL, $empty = FALSE) {
  $entity_type = explode(':', $conf['name']);
  $entity_type = $entity_type[1];
  $context_type = 'entity:' . $entity_type;
  $context_types = array($context_type, 'entity');

  // Use synonyms for legacy CTools contexts.
  switch ($entity_type) {
    case 'node':
      $context_type = 'node';
      $context_types[] = $context_type;
      break;

    case 'taxonomy_term':
      $context_type = 'term';
      $context_types[] = $context_type;
      break;

    case 'taxonomy_vocabulary':
      $context_type = 'vocabulary';
      $context_types[] = $context_type;
      break;
  }

  $context = NULL;
  if ($empty) {
    $context = ctools_context_create_empty($context_type);
  }
  else {
    if (is_object($arg)) {
      $context = ctools_context_create($context_type, $arg);
    }
    else {
      $entities = entity_load($entity_type, array($arg));
      if (empty($entities)) {
        return FALSE;
      }

      $context = ctools_context_create($context_type, reset($entities));
    }
  }
  if (empty($context)) {
    return FALSE;
  }
  if ((!empty($conf['bundle'])) && empty($context->restrictions)) {
    $context->restrictions = array('type' => array($conf['bundle']));
  }

  if (!is_array($context->type)) {
    $context->type = $context_types;
  }

  return $context;
}
