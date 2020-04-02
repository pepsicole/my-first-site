<div id="container">
<div id="heading"> <!-- Заголовок -->
  <h1>A cool jQuery gallery</h1>
  </div>
  <div id="gallery"> <!-- это блок для изображений -->
<?php

  //здесь идет PHP код
  ?>
<div class="clear"></div> <!-- using clearfix -->
  </div>
<div id="footer"> <!-- футер -->
  </div>
</div> <!-- закрывающий div -->

$directory = 'gallery';	//название папки с изображениями
$allowed_types=array('jpg','jpeg','gif','png');	//разрешеные типы изображений
$file_parts=array();
  $ext='';
  $title='';
  $i=0;
//пробуем открыть папку
  $dir_handle = @opendir($directory) or die("There is an error with your image directory!");
while ($file = readdir($dir_handle))	//поиск по файлам
  {
  if($file=='.' || $file == '..') continue;	//пропустить ссылки на другие папки
 $file_parts = explode('.',$file);	//разделить имя файла и поместить его в массив
  $ext = strtolower(array_pop($file_parts));	//последний элеменет - это расширение
 $title = implode('.',$file_parts);	
  $title = htmlspecialchars($title);	
 $nomargin='';
  if(in_array($ext,$allowed_types))	
  {

  if(($i+1)%4==0) $nomargin='nomargin';	//последнему изображению в ряде присваевается CSS класс "nomargin"
  echo '
  <div class="pic '.$nomargin.'" style="background:url('.$directory.'/'.$file.') no-repeat 50% 50%;">
  <a href="'.$directory.'/'.$file.'" title="'.$title.'" target="_blank">'.$title.'</a>
  </div>';
 $i++;	
  }
  }
closedir($dir_handle);	//закрыть папку

<link rel="stylesheet" type="text/css" href="lightbox/css/jquery.lightbox-0.5.css">
  <link rel="stylesheet" type="text/css" href="demo.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script type="text/javascript" src="lightbox/js/jquery.lightbox-0.5.pack.js"></script>
  <script type="text/javascript" src="script.js"></script>

  // после загрузки страницы
  $(document).ready(function(){
 $('.pic a').lightBox({
  
 imageLoading: 'lightbox/images/loading.gif',
  imageBtnClose: 'lightbox/images/close.gif',
  imageBtnPrev: 'lightbox/images/prev.gif',
  imageBtnNext: 'lightbox/images/next.gif'
 });
});