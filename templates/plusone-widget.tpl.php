<?php
/**
 * @file
 * Template for displaying the voting widget
 */
// Add the javascipt and CSS files
drupal_add_js(drupal_get_path('module', 'plusone') .'/plusone.js');
drupal_add_css(drupal_get_path('module', 'plusone') .'/plusone.css');
// build the output structure
$output = '<div class="plusone-widget">';
$output .= '<div id="message">';
$output .= '</div>';
$output .= '<div class="score">'. $total .'</div>';
$output .= '<div class="vote">';
// Based on the attributes – display the appropriate label
// below the vote count.
if ($is_author || !user_access('rate content')) {
// User is author; not allowed to vote.
    $output .= t('Votes');
}
elseif ($voted > 0) {
// User already voted; not allowed to vote again.
    $output .= t('You voted');
}
else {
// User is eligible to vote.
    $output .= l(t('Vote'), "plusone/vote/$nid", array(
        'attributes' => array('class' => 'plusone-link')
    ));
}
$output .= '</div>'; // Close div with class "vote".
$output .= '</div>'; // Close div with class "plusone-widget".
print $output;