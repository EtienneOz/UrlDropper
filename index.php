<!DOCTYPE html>
<html>
  <head lang="fr-FR">
    <meta charset="UTF-8">
    <title>Urldropper</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
  </head>
  <body>
    <h1>UrlDropper</h1
    <p> All you need is links.</p>
    <div class="content">
    <button class="more">Need more infos?</button>
    <?php
      // Here goes your feeds:
      $file = "http://yoursite.com/feeds.rss";
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
      Build by <a href="http://github.com/EtienneOz">ÉtienneOz</a>
      with my <a href="http://sebsauvage.net/wiki/doku.php?id=php:shaarli">Shaarli</a> feeds.
      Under <a href="https://www.gnu.org/licenses/gpl.html">GNU/GPL v2</a> License.
      <a href="https://github.com/EtienneOz/UrlDropper"> Fork it</a> !
    </div>
	<script src="js/jquery.js"></script>
    <script>
      function showtitle(source, title){
        source.click(function(){
          title.toggle();
        })
      }
      showtitle($('.more'), $('.toggle'))
    </script>
  </body>
</html>
