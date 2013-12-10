<?php
/**
 * Filename......: index.php
 * Author........: Justin Scott
 * Created.......: 11/13/13 10:51am
 * Description...: This project is designed to show Exchange Calendar events, Projects, and other weekly office information.
 * This file will only act as an information passthrough. I am calling the needed files to make this project run. I will
 * also be checking for all modules.
 */
$pagesList[] = <<<EOT
Donec nec elementum eros. Integer ut vulputate ligula, ac semper urna. Phasellus consectetur interdum ultrices. Donec at bibendum tortor. Phasellus eget interdum turpis, et gravida urna. Proin auctor nunc id aliquam sollicitudin. Maecenas lobortis lectus mi, ut dictum odio bibendum non. In et dignissim felis. Vestibulum vel cursus lectus. Nulla tristique nisi et fermentum consectetur. Duis non viverra magna. Cras lobortis neque id est sagittis commodo. Suspendisse molestie congue adipiscing.
EOT;
$pagesList[] = <<<EOO
Aenean quis semper sapien, eu hendrerit quam. Duis vestibulum tortor non dui interdum, quis feugiat nibh ullamcorper. Suspendisse a volutpat dui. Ut aliquam mi ac elit semper varius. Proin laoreet sodales nunc, eu imperdiet metus consequat sed. Nam sapien velit, accumsan ut placerat vitae, aliquam non nisi. Suspendisse eget urna justo.
EOO;
$pagesList[] = <<<ETT
Curabitur posuere, metus at rhoncus varius, nisl erat pulvinar velit, nec volutpat nisl quam eu risus. Sed sagittis lorem ipsum. Fusce eget ipsum tempor enim eleifend gravida sed eget eros. Maecenas molestie eros ut odio ullamcorper, sed convallis purus lacinia. Sed tellus neque, placerat volutpat laoreet accumsan, luctus et turpis. In iaculis ultrices porttitor. Nunc consequat venenatis ullamcorper. Suspendisse vitae est egestas, posuere risus vel, venenatis neque. Maecenas rhoncus leo vitae ante eleifend, vitae fringilla elit volutpat. Vestibulum sem arcu, blandit sed est ut, auctor rutrum elit. Fusce in neque at velit tincidunt pellentesque. Quisque gravida sollicitudin ligula sed rhoncus. Curabitur luctus velit diam, ac consectetur risus lacinia id. Ut cursus nec leo vitae pulvinar.
ETT;
$pagesList[] = <<<ETO
Fusce eget consequat quam. Proin ligula diam, hendrerit non consectetur pretium, hendrerit at quam. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur augue turpis, luctus consequat risus sit amet, dapibus auctor arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam fermentum ante nec enim iaculis facilisis. Duis mollis, tellus sed pellentesque pulvinar, tortor est cursus dui, ac pharetra leo nulla eu diam. Sed eleifend ante vel sem venenatis, at tempor nisi rutrum. Nulla eget fermentum mauris. Proin ultrices vestibulum turpis vel auctor. Nullam rutrum, purus eu placerat dapibus, metus odio dapibus ligula, et placerat magna orci a tortor. Donec non ipsum sagittis ligula sodales feugiat et at enim. Morbi magna mi, ullamcorper vitae adipiscing a, sollicitudin ac sem. Aenean molestie sapien risus, ac fermentum felis vestibulum ac. Nunc molestie accumsan lacinia.
ETO;
$pagesList[] = <<<EET
Nulla at lacus non risus tincidunt mollis vulputate a turpis. Pellentesque id sodales nisl. Praesent felis orci, posuere at ipsum non, interdum tempus arcu. Maecenas eu egestas mauris. Quisque tincidunt urna ac sollicitudin dapibus. Ut vel rhoncus lorem, a adipiscing felis. Sed purus felis, mollis quis arcu a, scelerisque commodo diam. Ut pharetra ipsum ante, quis tempor tellus consectetur vel.
EET;


$pages = count($pagesList) -1;
if (!isset($_SESSION['pageID'])) {
	# code...
	$pageID = 0;
}else{
	$pageID = $_SESSION['pageID'];
}
print_r($pagesList[$pageID]);