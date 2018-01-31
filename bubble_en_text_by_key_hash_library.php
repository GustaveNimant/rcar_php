<?php

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is key'] = "it is a word to be bubbled in english";
$Documentation[$module]['what is value'] = "it is the bubble text in english";


function bubble_en_text_by_key_hash_make () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $bubble_en_text_by_key_hash = 
    array (
        'action' => 'an action is one off remove&#44; history&#44; rename or undo',
        'block' => 'a block is defined for a property. It contains 4 elements : the current item&#44; the justification for having created the current item&#44; the previous item and the sha1 of the previous block',
        'choose' => 'click on one of the radio buttons',
        'entry' => 'an entry is a concept defined by the list of its properties e.g. Democracy&#44; General will&#44; etc ...&#41;',
        'item' => 'an item is a property of an entry it is a component of a block',
        'justify' => 'a justification proves that the modification done complies with the rules',
        'justification' => 'a justification proves that the modification done complies with the rules',
        'modify the order' => 'the order of properties may be not pertinent',
        'name' => 'the name of an entity recast from its surname',
        'new paragraph' => 'new paragraph',
        'new property' => 'new property',
        'new question' => 'new question',
        'new rule' => 'create a new rule to refine the editing criteria',
        'order' => 'the order of paragraphs may be improved',
        'order of properties' => 'the order of properties may be not pertinent',
        'order of rules' => 'the order of rules may be not pertinent',
        'paragraph' => 'a paragraph is a list of consecutive sentences',
        'property' => 'a property of an entry is an assertion it should verify',
        'question' => 'a question is a sentence starting with what, why or how',
        'reorder' => 'the order may be not pertinent',
        'rule' => 'ARCE has three kinds of rules : general rules, editing rules and property rules',
        'select' => 'select an item from the drop-down list',
        'surname' => 'the name provided by the User',
        'usage item' => 'it is an usage item',
        'usage items' => 'they are usage items',
	   )
    ;
  
  /* plurals */
  
  $bubble_en_text_by_key_hash['blocks'] = $bubble_en_text_by_key_hash['block'];
  $bubble_en_text_by_key_hash['entries'] = $bubble_en_text_by_key_hash['entry'];
  $bubble_en_text_by_key_hash['paragraphes'] = $bubble_en_text_by_key_hash['paragraph'];
  $bubble_en_text_by_key_hash['properties'] = $bubble_en_text_by_key_hash['property'];
  $bubble_en_text_by_key_hash['questions'] = $bubble_en_text_by_key_hash['question'];
  $bubble_en_text_by_key_hash['rules'] = $bubble_en_text_by_key_hash['rule'];
  $bubble_en_text_by_key_hash['names'] = $bubble_en_text_by_key_hash['name'];
  $bubble_en_text_by_key_hash['surnames'] = $bubble_en_text_by_key_hash['surname'];

  /* expressions */

  $bubble_en_text_by_key_hash['new properties'] = $bubble_en_text_by_key_hash['new property'];
  
  debug_n_check ($here , '$bubble_en_text_by_key_hash', $bubble_en_text_by_key_hash);
  exiting_from_function ($here);
  
  return $bubble_en_text_by_key_hash;
  
}

function bubble_la_text_by_key_array_make () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $en_txt_bub_a = bubble_en_text_by_key_hash_make ();
  
  debug_n_check ($here , '$en_txt_bub_a', $en_txt_bub_a);
  
  foreach ($en_txt_bub_a as $en_key_bub => $en_txt_bub) {
      
      $la_key_bub = language_translate_of_en_string ($en_key_bub);
      $la_txt_bub = language_translate_of_en_string ($en_txt_bub);
      
    $la_txt_bub_a[$la_key_bub] = $la_txt_bub;
    
    debug_n_check ($here , '$en_key_bub', $en_key_bub);
    debug_n_check ($here , '$la_key_bub', $la_key_bub);
    debug_n_check ($here , '$en_txt_bub', $en_txt_bub);
    debug_n_check ($here , '$la_txt_bub', $la_txt_bub);
  }

  debug_n_check ($here , '$la_txt_bub_a', $la_txt_bub_a);
  exiting_from_function ($here);

  return $la_txt_bub_a;

}


?>