<?php

/**
 * @file
 * Process theme data.
 *
 * Use this file to run your theme specific implimentations of theme functions,
 * such preprocess, process, alters, and theme function overrides.
 *
 * Preprocess and process functions are used to modify or create variables for
 * templates and theme functions. They are a common theming tool in Drupal, often
 * used as an alternative to directly editing or adding code to templates. Its
 * worth spending some time to learn more about these functions - they are a
 * powerful way to easily modify the output of any template variable.
 *
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "adaptivetheme_subtheme" to match
 *    your subthemes name, e.g. if your theme name is "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "adaptivetheme_subtheme".
 * 2. Uncomment the required function to use.
 */


/**
 * Preprocess variables for the html template.
 */
/*
function dunsel_7_preprocess_html(&$vars) {
  global $theme_key;
  // Two examples of adding custom classes to the body.

  // Add a body class for the active theme name.
  // $vars['classes_array'][] = drupal_html_class($theme_key);

  // Browser/platform sniff - adds body classes such as ipad, webkit, chrome etc.
  // $vars['classes_array'][] = css_browser_selector();

}
// */


/**
 * Process variables for the html template.
 */
/* -- Delete this line if you want to use this function
function adaptivetheme_subtheme_process_html(&$vars) {
}
// */


function tuitiontool_2017_node_view_alter(&$build){
}

function tuitiontool_2017_page_alter(&$page){
}



/**
 * Override or insert variables for the page templates.
*/

function tuitiontool_2017_process_page(&$vars) {
    if($vars['logged_in']){
      //dsm($vars['user']);
        $roles = $vars['user']->roles;
	$role_array_vals = array_values($roles);
	if($role_array_vals[0] == 'authenticated user' && count($roles) > 1){
	  $role_1 = $role_array_vals[1];
	  if($role_1 == 'administrator'){
            $vars['page']['header-dept'] = "Administrator";
            $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('main-menu')));
	  }
	  elseif($role_1 == "Grad Admin"){
	    $vars['page']['header-dept'] = "Grad Office Admin";
	    $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-graduate-admin-menu')));
	  }
	  elseif(!(strpos($role_1,"Viewer") === FALSE)){
	    if(in_array("Admin Viewer",$role_array_vals)){
	      $vars['page']['header-dept'] = "Administrative Viewer";
	      $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-graduate-admin-menu')));
	    }
	    else{
	      switch ($role_1){
	      case "American Viewer":
		$vars['page']['header-dept'] = "American Studies";
		$vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-american-menu')));
		break;
	      case "Bio Viewer":
                $vars['page']['header-dept'] = "Biological Sciences";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-bio-menu')));
                break;
	    case "Chem Viewer":
                $vars['page']['header-dept'] = "Chemistry Department";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-chem-menu')));
                break;
	    case "EES Viewer":
                $vars['page']['header-dept'] = "Earth & Environmental Sciences";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-ees-menu')));
                break;
	    case "English Viewer":
                $vars['page']['header-dept'] = "English Department";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-english-menu')));
                break;
	    case "EPD Viewer":
                $vars['page']['header-dept'] = "Environmental Policy Design";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-epd-menu')));
                break;
	    case "History Viewer":
                $vars['page']['header-dept'] = "History Department";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-history-menu')));
                break;
	    case "Math Viewer":
                $vars['page']['header-dept'] = "Mathematics";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-math-menu')));
                break;
	    case "Physics Viewer":
                $vars['page']['header-dept'] = "Physics Department";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-physics-menu')));
                break;
	    case "Polisci Viewer":
                $vars['page']['header-dept'] = "Political Science";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-polisci-menu')));
                break;
	    case "Psych Viewer":
                $vars['page']['header-dept'] = "Psychology Department";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-psych-menu')));
                break;
	    case "Socanth Viewer":
                $vars['page']['header-dept'] = "Sociology & Anthropology";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-socanth-menu')));
                break;
            default:
	      $vars['page']['header-dept'] = "AUTH USER";
	      $vars['page']['custom-header-menu'] = "";
	      }//end of 'viewer' switch
	    }//end of if 'viewer' in role_1 but no 'admin viewer'
	  }//end of if 'viewer' in role_1
	  else{
	    switch ($role_1){
	      case "American":
		$vars['page']['header-dept'] = "American Studies";
		$vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-american-menu')));
                break;
            case "Bio":
                $vars['page']['header-dept'] = "Biological Sciences";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-bio-menu')));
                break;
            case "Chem":
                $vars['page']['header-dept'] = "Chemistry Department";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-chem-menu')));
                break;
            case "EES":
                $vars['page']['header-dept'] = "Earth & Environmental Sciences";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-ees-menu')));
                break;
            case "English":
                $vars['page']['header-dept'] = "English Department";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-english-menu')));
                break;
            case "EPD":
                $vars['page']['header-dept'] = "Environmental Policy Design";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-epd-menu')));
                break;
	    case "Interdisciplinary":
	        $vars['page']['header-dept'] = "Interdisciplinary";
	        $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-intdisc-menu')));
                break;
            case "History":
                $vars['page']['header-dept'] = "History Department";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-history-menu')));
                break;
            case "Math":
                $vars['page']['header-dept'] = "Mathematics";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-math-menu')));
                break;
            case "Physics":
                $vars['page']['header-dept'] = "Physics Department";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-physics-menu')));
                break;
            case "Polisci":
                $vars['page']['header-dept'] = "Political Science";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-polisci-menu')));
                break;
            case "Psych":
                $vars['page']['header-dept'] = "Psychology Department";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-psych-menu')));
                break;
            case "Socanthro":
                $vars['page']['header-dept'] = "Sociology & Anthropology";
                $vars['page']['custom-header-menu'] = theme('links', array('links' => menu_navigation_links('menu-socanth-menu')));
                break;
            default:
	      $vars['page']['header-dept'] = "AUTH USER";
	      $vars['page']['custom-header-menu'] = "";
            }//end of switch for coordinators
	  }//end of else for auth users
	}//end of if 'authenticated user' and user has more than 1 role.
	else{
	  $vars['page']['header-dept'] = "AUTH USER";
	  $vars['page']['custom-header-menu'] = "";
	}
    }//end of if user is logged in
    else{
      $vars['page']['header-dept'] = "Please Log In";
      $vars['page']['custom-header-menu'] = "";
    }
} //end of process page function




function tuitiontool_2017_preprocess_node(&$vars){

    //PUT SOME CODE IN HERE TO ALTER THE DISPLAY OF THE "NO ACCOUNT REQUIRED" FIELD:
    //     ONLY DISPLAY THE PHRASE(THE FIELD) IF THE VALUE OF THE FIELD IS 1
    
  $aid_types = array('american_aid_type','bio_aid_type','chem_aid_type','coll_aid_type','ees_aid_type','english_aid_type','epd_aid_type','intdisc_aid_type','history_aid_type','math_aid_type','misc_aid_type','physics_aid_type','polisci_aid_type','psych_aid_type','socanth_aid_type');
    
  $aid_entries = array('american_aid_entry','bio_aid_entry','chem_aid_entry','coll_aid_entry','ees_aid_entry','english_aid_entry','epd_aid_entry','intdisc_aid_entry','history_aid_entry','math_aid_entry','misc_aid_entry','physics_aid_entry','polisci_aid_entry','psych_aid_entry','socanth_aid_entry');
    //If this function is ever used for doing more than just adding extra css to the edit form then add separate functions to do this stuff

    //This will add a generic class to an edit form for aid_types and aid_entries so that I can target all css with 1 line instead of tons.

    if(in_array('type',$vars)){
        if(in_array($vars['type'],$aid_types)){
            if(in_array('classes_array',$vars)){
	      $vars['classes_array'][] = 'node-general-aid-type-display';
	      //this disables displaying the 'No Account Required' field if it is unchecked.
	      if(in_array('field_no_acct_req',$vars)){
		if(!empty($vars['field_no_acct_req'][0])){
		  if($vars['field_no_acct_req'][0]['value'] == 0){
		    //not sure if this is the best way to do this. but it works for now.
		    unset($vars['content']['field_no_acct_req']);
		  }
		}
	      }
            }
        }
    }

    if(in_array('type',$vars)){
        if(in_array($vars['type'],$aid_entries)){
            if(in_array('classes_array',$vars)){
                $vars['classes_array'][] = 'node-general-aid-entry-display';
            }
        }
    }
	
}

/**
 * Override or insert variables into the node templates.
 */
/* -- Delete this line if you want to use these functions
function adaptivetheme_subtheme_preprocess_node(&$vars) {
}
function adaptivetheme_subtheme_process_node(&$vars) {
}
// */


/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function adaptivetheme_subtheme_preprocess_comment(&$vars) {
}
function adaptivetheme_subtheme_process_comment(&$vars) {
}
// */


/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function adaptivetheme_subtheme_preprocess_block(&$vars) {
}
function adaptivetheme_subtheme_process_block(&$vars) {
}
// */


function get_aid_counts($node){
    //setup variables to make sure this is an entry to display the counts
  $aid_entries = array('american_aid_entry','bio_aid_entry','chem_aid_entry','coll_aid_entry','ees_aid_entry','english_aid_entry','epd_aid_entry','intdisc_aid_entry','history_aid_entry','math_aid_entry','misc_aid_entry','physics_aid_entry','polisci_aid_entry','psych_aid_entry','socanth_aid_entry');
    $bundle = $node->type;

    if(in_array($bundle, $aid_entries)){
        //Setup variables and retrieve some info 
        $lang = $node->language;
	if(in_array('entity',$node->field_aid_type[$lang][0])){ //I need this because the totals box display on the revision listing page for the node
	  $aid_object = $node->field_aid_type[$lang][0]['entity'];
	  $aid_id = $node->field_aid_type[$lang][0]['target_id'];
	  $aid_title = $aid_object->title;
	  
	  //CREDITS & MAX CREDITS
	  $max_credits = 0;
	  settype($max_credits,'float');
	  if(count($aid_object->field_credits_year)>0){
            $max_credits = intval($aid_object->field_credits_year[$lang][0]['value']); //max credits set in the aid type
	  }else{
            $max_credits = 0;
	  }
	  
	  //TUITION AND MAX TUITION
	  $max_tuition = 0;
	  settype($max_tuition,'float');
	  if(count($aid_object->field_calc_tuition)>0){
            $max_tuition = floatval($aid_object->field_calc_tuition[$lang][0]['value']);
	  }else{
            $max_tuition = 0;
	  }
	  
	  //STIPEND AND MAX STIPEND
	  $max_stipend = 0;
	  settype($max_stipend,'float');
	  if(count($aid_object->field_stipends_year)>0){
            $max_stipend = floatval($aid_object->field_stipends_year[$lang][0]['value']);
	  }else{
            $max_stipend = 0;
	  }
	  //MAX STUDENTS
	  if(count($aid_object->field_students_year)>0){
            $max_students = $aid_object->field_students_year[$lang][0]['value'];
	  }else{
            $max_students = 0;
	  }
	  
	  //summing variables
	  $cred_sum = 0;
	  $tuit_sum = 0;
	  $stud_sum = 0;
	  $stip_sum = 0;
	  
	  settype($cred_sum,'float');
	  settype($tuit_sum,'float');
	  settype($stip_sum,'float');
	  
	  //setup query object to search for nodes that match
	  $ent_query = new EntityFieldQuery();
	  //these conditions filter the node list that will do the summing.
	  $ent_query->entityCondition('entity_type','node') //type is node
	    ->entityCondition('bundle',$bundle) //only select from the same bundle (i.e. dept aid type)
	    ->propertyCondition('status',NODE_PUBLISHED) //the node is published
	    ->fieldCondition('field_aid_type','target_id',$aid_id,'=') //only select if it uses the same aid type
	    ->addMetaData('account', user_load(1));
	  //execute query
	  $match_ents = $ent_query->execute();
	  if(count($match_ents) > 0){ //put a check here to make sure you can't max out your credits on one person (unlikely but still a possibility)
            $stud_sum = count($match_ents['node']);
            if($stud_sum > 0){
	      $match_ids = array(); //turn query array into list of just nids
	      foreach($match_ents['node'] as $myent){
		$match_ids[] = $myent->nid;
	      }
	      //load node objects into iterable array
	      $load_node = entity_load('node',$match_ids);
	      //finally do the calculating
	      foreach($load_node as $curnode){
		//add credits
		if(count($curnode->field_credits)>0){
		  $cred_sum += $curnode->field_credits[$lang][0]['value']; //credit value for this node
		}
		//add tuition
		if(count($curnode->field_tuition)>0){
		  $tuit_sum += $curnode->field_tuition[$lang][0]['value'];
		}
		//add stipend
		if(count($curnode->field_stipend)>0){
		  $stip_sum += $curnode->field_stipend[$lang][0]['value'];
		}
	      }
            }
	  }
	  
	  $cred_rem = 0;
	  settype($cred_rem, 'float');
	  $tuit_rem = 0;
	  settype($tuit_rem, 'float');
	  $stip_rem = 0;
	  settype($stip_rem, 'float');
	  
	  $cred_rem = $max_credits - $cred_sum;
	  $tuit_rem = $max_tuition - $tuit_sum;
	  $stip_rem = $max_stipend - $stip_sum;
	  $stud_rem = $max_students - $stud_sum;
	  
	  //I don't think that I need this array anymore
	  $aid_stats = array(
			     'credit' => array('total'=>$cred_sum,'max'=>$max_credits,'left'=>$cred_rem),
			     'tution' => array('total'=>$tuit_sum,'max'=>$max_tuition,'left'=>$tuit_rem),
			     'stipend' => array('total'=>$stip_sum,'max'=>$max_stipend,'left'=>$stip_rem),
			     'student' => array('total'=>$stud_sum,'max'=>$max_students,'left'=>$stud_rem)
			     );
        
	  $render_totals = "<div><table>                        
                           <tr>
                           <th class =\"totals-aid-type\">".$aid_title."</th>
                           <th> Credits </th>
                           <th> Tuition </th>
                           <th> Stipend </th>
                           <th> Students </th>
                       </tr>
                       <tr class = \"maximums\">
                           <td>Max Allowed</td>
                           <td> %.2f </td>
                           <td> $%.2f </td>
                           <td> $%.2f </td>
                           <td> %d </td>
                      </tr>     
                       <tr class = \"totals\">
                           <td>Current Total</td>
                           <td> %.2f </td>
                           <td> $%.2f </td>
                           <td> $%.2f </td>
                           <td> %d </td>
                      </tr>     
                       <tr class = \"remaininig\">
                           <td>Remaining</td>
                           <td> %.2f </td>
                           <td> $%.2f </td>
                           <td> $%.2f </td>
                           <td> %d </td>
                      </tr>     
         </table></div>";         

	  $tbl = array($render_totals,
		       $max_credits, $max_tuition, $max_stipend, $max_students,
		       $cred_sum, $tuit_sum, $stip_sum, $stud_sum,
		       $cred_rem, $tuit_rem, $stip_rem, $stud_rem);
	  
	  return $tbl;
	}//end of if 'entity' is in the list for aid_type field
    }//end of if the bundle is in the list of bundles to operate on 
}

function is_an_entry($type){
  $aid_entries = array('american_aid_entry','bio_aid_entry','chem_aid_entry','coll_aid_entry','ees_aid_entry','english_aid_entry','epd_aid_entry','intdisc_aid_entry','history_aid_entry','math_aid_entry','misc_aid_entry','physics_aid_entry','polisci_aid_entry','psych_aid_entry','socanth_aid_entry');

    return in_array($type, $aid_entries);

}

function process_entry_content($content, $raw_type){

    $type = get_entry_bundle_title($raw_type);

    $replace_value = '<section class="field field-name-field-aid-type field-type-entityreference field-label-inline clearfix view-mode-full">';

    $new_content = str_replace($replace_value,
    '<section class="entry-type-section"><h2 class="entry-dept-title">'.$type.'</h2></section>'.$replace_value,
    $content);
        
    return $new_content;

}


function get_entry_bundle_title($raw_type){
  //turn the switch statement into an array and just map the titles to the aid entries
  $bundle_titles = array();

    switch ($raw_type){
        case 'american_aid_entry':
            return 'American Entry';
        case 'bio_aid_entry':
            return 'Biology Entry';
        case 'chem_aid_entry':
            return 'Chemistry Entry';
        case 'coll_aid_entry':
            return 'College Entry';
        case 'ees_aid_entry':
            return 'Earth & Environmental Entry';
        case 'english_aid_entry':
            return 'English Entry';
        case 'epd_aid_entry':
            return 'Environmental Policy Entry';
        case 'intdisc_aid_entry':
	    return 'Interdisciplinary Entry';
        case 'history_aid_entry':
            return 'History Entry';
        case 'math_aid_entry':
            return 'Math Entry';
        case 'misc_aid_entry':
            return 'Miscellaneous Entry';
        case 'physics_aid_entry':
            return 'Physics Entry';
        case 'psych_aid_entry':
            return 'Psychology Entry';
        case 'polischi_aid_entry':
            return 'Political Science Entry';
        case 'socanth_aid_entry':
            return 'Sociology & Antrhopology Entry';
        default:
            return '';
        }
}

function print_bundle_type($type){

    switch ($type){
        case 'american_aid_type':
            return 'American Aid Type';
        case 'bio_aid_type':
            return 'Biololgy Aid Type';
        case 'chem_aid_type':
            return 'Chemistry Aid Type';
        case 'coll_aid_type':
            return 'College Aid Type';
        case 'ees_aid_type':
            return 'Earth & Environmental Science Aid Type';
        case 'english_aid_type':
            return 'English Aid Type';
        case 'epd_aid_type':
            return 'Environmental Policy Design Aid Type';
        case 'intdisc_aid_type':
            return 'Interdisciplinary Aid Type';
        case 'history_aid_type':
            return 'History Aid Type';
        case 'math_aid_type':
            return 'Mathematics Aid Type';
        case 'misc_aid_type':
            return 'Miscellaneous Aid Type';
        case 'physics_aid_type':
            return 'Physics Aid Type';
        case 'polisci_aid_type':
            return 'Political Science Aid Type';
        case 'psych_aid_type':
            return 'Psychology Aid Type';
        case 'socanth_aid_type':
            return 'Sociology & Anthropology Aid Type';
    default: 
        return '';
    }
}