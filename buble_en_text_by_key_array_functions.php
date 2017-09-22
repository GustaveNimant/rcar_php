<?php

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is key'] = "it is a word to be bubbled in english";
$Documentation[$module]['what is value'] = "it is the bubble text in english";

# entering_in_module ($module);

function buble_en_text_by_key_array_make () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $buble_en_text_by_key_array = 
    array (
        'action' => 'an action is one off delete, modify, justify or rename',
        'choose' => 'click on one of the radio buttons',
        'entry' => 'an entry is a concept defined&#010 by the list of its properties',
        'justification' => 'a justification proves that the&#010 modification done complies with the rules',
        'modify' => 'modify the property',
        'new paragraph' => 'new paragraph',
        'new property' => 'new property',
        'new question' => 'new question',
        'new rule' => 'create a new rule to refine the editing criteria',
        'order' => 'the order of paragraphs may be not pertinent',
        'order of properties' => 'the order of properties may be not pertinent',
        'order of rules' => 'the order of rules may be not pertinent',
        'paragraph' => 'a paragraph is a list of consecutive sentences',
        'property' => 'a property of an entry&#010 is an assertion it should verify',
        'questions' => 'questions',
        'reorder' => 'the order may be not pertinent',
        'rule' => 'ARCE has three kinds of rules : general rules, editing rules and property rules',
        'select' => 'select an item from the drop-down list',
        'surname' => 'the name provided by the User',
        'usage item' => 'it is an usage item',
        'usage items' => 'they are usage items',
	   )
    ;
  
  /* expression */
  
  $buble_en_text_by_key_array['paragraphes'] = $buble_en_text_by_key_array['paragraph'];
  $buble_en_text_by_key_array['properties'] = $buble_en_text_by_key_array['property'];
  $buble_en_text_by_key_array['new properties'] = $buble_en_text_by_key_array['new property'];
  $buble_en_text_by_key_array['entries'] = $buble_en_text_by_key_array['entry'];
  $buble_en_text_by_key_array['rules'] = $buble_en_text_by_key_array['rule'];
  $buble_en_text_by_key_array['surnames'] = $buble_en_text_by_key_array['surname'];
  
  debug_n_check ($here , '$buble_en_text_by_key_array', $buble_en_text_by_key_array);
  exiting_from_function ($here);
  
  return $buble_en_text_by_key_array;
  
}

function bubble_la_text_by_key_array_make () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $en_txt_bub_a = buble_en_text_by_key_array_make ();
  
  # debug_n_check ($here , '$en_txt_bub_a', $en_txt_bub_a);

  foreach ($en_txt_bub_a as $en_key_bub => $en_txt_bub) {

      $la_key_bub = language_translate_of_en_string ($en_key_bub);
      $la_txt_bub = language_translate_of_en_string ($en_txt_bub);

    $la_txt_bub_a[$la_key_bub] = $la_txt_bub;
    /* debug_n_check ($here , '$en_key_bub', $en_key_bub); */
    /* debug_n_check ($here , '$la_key_bub', $la_key_bub); */
    /* debug_n_check ($here , '$en_txt_bub', $en_txt_bub); */
    /* debug_n_check ($here , '$la_txt_bub', $la_txt_bub); */
  }

  # debug_n_check ($here , '$la_txt_bub_a', $la_txt_bub_a);
  exiting_from_function ($here);

  return $la_txt_bub_a;

}

?>