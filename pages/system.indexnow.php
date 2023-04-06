<?php
#
$addon = rex_addon::get('indexnow');

$form = rex_config_form::factory($addon->name);

$field = $form->addInputField('text', 'apikey', null, ["class" => "form-control"]);
$field->setLabel(rex_i18n::msg('indexnow_config_apikey_label'));
$field->setNotice('<a href="https://www.bing.com/indexnow">'.rex_i18n::msg('indexnow_config_apikey_notice').'</a>');

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', $addon->i18n('indexnow_config'), false);
$fragment->setVar('body', $form->get(), false);
echo $fragment->parse('core/page/section.php');
