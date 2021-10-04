
<?php
include_once "data.php";


// Load menu lv1
$xhtmlMenu = '';



foreach($arrMenu as $key => $val){
    $activeMenu = ( isset($val['child'][$menuCurrent])) ? 'class="active"' : '';    
    
    if(isset($val['child'])){
        $xhtmlMenu .= '<li '.$activeMenu.'><a href="'. $val['link'].'">'. $val['name'].'</a><ul>';
        foreach($val['child'] as $key2 => $val2){      
            $activeMenu2 = (isset($val2['child'][$menuCurrent]) ||  $menuCurrent == $key2 ) ? 'class="active"' : '';   
            $xhtmlMenu .= sprintf('<li %s><a href="%s">%s </a><ul>',$activeMenu2, $val2['link'] , $val2['name']);
            if(isset($val2['child'])){              
                foreach($val2['child'] as $key3 => $val3){
                    $activeMenu3 = ( $menuCurrent == $key3 ) ? 'class="active"' : ''; 
                    
                    $xhtmlMenu .= sprintf('<li %s><a href="%s" >%s </a></li>',$activeMenu3, $val3['link'] , $val3['name']);

                    // if($activeMenu3 != null){
                    //     $flag = false;
                    // }
                }
            }
                
            
            
            $xhtmlMenu .= '</ul></li>';
        }
        // if(isset($val2['child'])){
        //     $activeMenu = ( isset($val['child'][$menuCurrent]) ) ? 'class="active"' : '';     
        // }
        $xhtmlMenu .= '</ul></li>';
        

    
    }else{
        $xhtmlMenu .= sprintf('<li %s><a href="%s">%s </a></li>',$activeMenu, $val['link'] , $val['name']);
    }
    
}
    ?>

    <div class="menuBackground">
        <div class="center">
            <ul class="dropDownMenu">
               <?php echo $xhtmlMenu; ?>
            </ul>
        </div>
    </div>
    