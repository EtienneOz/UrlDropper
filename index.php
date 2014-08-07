<!DOCTYPE html>
<html>
  <head lang="fr-FR">
    <meta charset="UTF-8">
    <?php
      ///////////////////////////////
      // Here goes the page title: //
      ///////////////////////////////
      $theTitle = 'http://etienneozeray.fr/UrlDropper';
      echo '<title>'.$theTitle.'</title>';
    ?>
    <link type="text/css" rel="stylesheet" href="style.css" />
  </head>
  <body>
    <?php
      echo '<div class="header">
        <h1><a href="'.$theTitle.'">'.$theTitle.'</a></h1>';
        ?>
        <span class="title">All you need is links.</span></p>
    </div>
    <div class="content">
      <button class="more">Need more informations?</button>
      <button class="less">Need less information?</button>
      <?php
        ///////////////////////////
        // Here goes your feeds: //
        ///////////////////////////
        $file = "http://etienneozeray.fr/shaarli/?do=rss&searchtags=DropIt";
        $content = file_get_contents($file);
        $x = new SimpleXmlElement($content);
        echo "<ul class='liste'>";

        foreach($x->channel->item as $entry) {
          echo "<li class='theUrl'><a href='$entry->link'>" . $entry->link . "</a>";
          echo "<span class='toggle'><span class='title'> " . $entry->title . " </span>";
          $categories = $entry->category;
             $nb = count($categories);
             for ($i=0; $i<$nb; $i++){
               echo '<span class="toggle '.$entry->title.' categories">' .$categories[$i]. '</span>';
             }
             echo "</li>";
         }
        echo "</ul>";

      ?>
    </div>
    <div class="footer">
      Build by <a href="http://github.com/EtienneOz">ÉtienneOz</a><br/>
      Generated with my <a href="http://sebsauvage.net/wiki/doku.php?id=php:shaarli">Shaarli</a> feeds.<br/>
      Under <a href="https://www.gnu.org/licenses/gpl.html">GNU/GPL v2</a> License.<br/>
      <a href="https://github.com/EtienneOz/UrlDropper"> Fork it</a> !
    </div>
	<script src="js/jquery.js"></script>
  <script>
    function showtitle(more, less, title){
      more.click(function(){
        title.show();
        less.show();
        more.hide();
      })
      less.click(function(){
        title.hide();
        less.hide();
        more.show();
      })
    }
    showtitle($('.more'), $('.less'), $('.toggle'));
  </script>
  </body>
</html>
