<?php
/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<div class="row object-in-dashboard">
  <div class="col-md-8">
    <div class="row">
      <div class="col-md-12">
        <?php print $fields['title']->wrapper_prefix; ?>
        <?php print $fields['title']->label_html; ?>
        <?php print $fields['title']->content; ?>
        <?php print $fields['title']->wrapper_suffix; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <?php print $fields['field_object_state_develop']->wrapper_prefix; ?>
        <?php print $fields['field_object_state_develop']->label_html; ?>
        <?php print $fields['field_object_state_develop']->content; ?>
        <?php print $fields['field_object_state_develop']->wrapper_suffix; ?>
      </div>
      <div class="col-md-4">
        <?php print $fields['created']->wrapper_prefix; ?>
        <?php print $fields['created']->label_html; ?>
        <?php print $fields['created']->content; ?>
        <?php print $fields['created']->wrapper_suffix; ?>
      </div>
      <div class="col-md-4">
        <?php print $fields['field_object_status']->wrapper_prefix; ?>
        <?php print $fields['field_object_status']->label_html; ?>
        <?php print $fields['field_object_status']->content; ?>
        <?php print $fields['field_object_status']->wrapper_suffix; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <?php print $fields['field_object_number']->wrapper_prefix; ?>
        <?php print $fields['field_object_number']->label_html; ?>
        <?php print $fields['field_object_number']->content; ?>
        <?php print $fields['field_object_number']->wrapper_suffix; ?>
      </div>
      <div class="col-md-4">
        <?php print $fields['field_object_date_reg']->wrapper_prefix; ?>
        <?php print $fields['field_object_date_reg']->label_html; ?>
        <?php print $fields['field_object_date_reg']->content; ?>
        <?php print $fields['field_object_date_reg']->wrapper_suffix; ?>
      </div>
      <div class="col-md-4">
        <?php print $fields['field_object_passport_status']->wrapper_prefix; ?>
        <?php print $fields['field_object_passport_status']->label_html; ?>
        <?php print $fields['field_object_passport_status']->content; ?>
        <?php print $fields['field_object_passport_status']->wrapper_suffix; ?>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <ul class="b-ptabs">
      <li class="ptabs-item ptabs-item-toggle">
        <?php if (!empty($row->actions)) : ?>
          <a href="#" class="dropdown-toggle ptabs-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Действия с ОУ</a>
          <ul class="ptabs-dropdown-menu dropdown-menu">
            <?php foreach ($row->actions as $action) : ?>
              <li class="ptabs-dropdown-item">
                <a class="ptabs-dropdown-link ctools-use-modal" href="<?php print(!empty($action['link']) ? $action['link'] : '#'); ?>">
                  <span class="icon-tabs<?php print $action['icon']; ?>"></span> <?php print $action['plain_title']; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <a href="#" class="dropdown-toggle ptabs-link empty">Нет доступных действий</a>
        <?php endif; ?>
      </li>
    </ul>
  </div>
</div>