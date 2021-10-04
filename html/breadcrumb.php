<?php
require_once 'data.php';


 // duyệt qua cấp 1
foreach($arrMenu as $key1 => $val1){
    $arrBreadcrumb[$key1][] = ['name' => $val1['name'], 'link' => $val1['link']];   // cap 1

    // Kiểm tra và duyệt qua cấp 2
    if(isset($val1['child'])){ 
        foreach($val1['child'] as $key2 => $val2) {

            $arrBreadcrumb[$key2][] = ['name' => $val1['name'], 'link' => $val1['link']]; 
            $arrBreadcrumb[$key2][] = ['name' => $val2['name'], 'link' => $val2['link']];   

                if (isset($val2['child'])) {
                    foreach ($val2['child'] as $key3 => $val3) {
                        $arrBreadcrumb[$key3][] = ['name' => $val1['name'], 'link' => $val1['link']]; 
                        $arrBreadcrumb[$key3][] = ['name' => $val2['name'], 'link' => $val2['link']];   
                        $arrBreadcrumb[$key3][] = ['name' => $val3['name'], 'link' => $val3['link']];   
                    }
                }

        }
    }
}

// echo '<pre>';
// print_r($arrBreadcrumb['sale']);
// echo '</pre>';




$currentBreadcrumb = $arrBreadcrumb[$menuCurrent];
$lengthBreadcrumb = count($currentBreadcrumb);

// chiều dài thằng sale là 3

$xhtmlBreadcrumb  = '';
 switch ($lengthBreadcrumb) {
     case 1:
         if($menuCurrent == 'index')
            $xhtmlBreadcrumb .= sprintf('<a href="index.php">Home</a>');
        else
            $xhtmlBreadcrumb = sprintf('<a href="index.php">Home</a><span> > </span>%s', $currentBreadcrumb[0]['name']);

         break;

    case 2:
        $xhtmlBreadcrumb .= sprintf('<a href="index.php">Home</a>
     <span>></span><a href="%s">%s</a>
    <span> > </span><span> %s</span>', $currentBreadcrumb[0]['link'],$currentBreadcrumb[0]['name'],$currentBreadcrumb[1]['name'] );

         break;
     
    //   case 3:
    //     $xhtmlBreadcrumb .= sprintf('<a href="index.php">Home</a>
    //     <span>></span><a href="%s">%s</a>
    //    <span> > </span><a href="%s">%s</a>
    //    <span> > </span><span> %s</span>', $currentBreadcrumb[0]['link'],$currentBreadcrumb[0]['name'],$currentBreadcrumb[1]['link'],$currentBreadcrumb[1]['name'],$currentBreadcrumb[2]['name'] );
    //      break;

    case 3:
        $xhtmlBreadcrumb .= '<a href="index.php">Home</a>';
        if ($lengthBreadcrumb >= 3){
            for ($i = 0; $i < $lengthBreadcrumb; $i++){
                if($i == $lengthBreadcrumb - 1){
                    $xhtmlBreadcrumb .= '<span>></span><a>' .$currentBreadcrumb[$i]['name'].'</a> ';
                }else{
                    $xhtmlBreadcrumb .= '<span>></span><a href="'.$currentBreadcrumb[$i]['link'].'">'.$currentBreadcrumb[$i]['name'].'</a>';
                }   

            }
        }
        
        break;
 }



?>





<div class="breadcrumb">
      <?php echo $xhtmlBreadcrumb ; ?>
    </div>


