<!DOCTYPE html>
<html>
  <head lang="fr-FR">
    <meta charset="UTF-8">
    <?php
      // Here goes the page title:
      $pageTitle = 'http://etienneozeray.fr/UrlDropper';
    ?>
    <title><?= $pageTitle ?></title>';
    <link type="text/css" rel="stylesheet" href="css/style.css" />
  </head>
  <body>

    <header>
    <h1><a href="<?= $theTitle ?>"><?= $theTitle ?></a></h1>'
        <span class="title toggleInfos">All you need is links.</span></p>
    </header>

    <div class="content">
      <button class="moreInfos">Need more informations?</button>
      <button class="lessInfos">Don't care</button>
      <button class="moreCredits">WTF?</button>
      <button class="lessCredits">Who care?</button>
      <?php
        // Here goes your feeds:
        $feed = "http://etienneozeray.fr/shaarli/?do=rss&searchtags=DropIt";
        $content = file_get_contents($feed);
        $xml = new SimpleXmlElement($content);
        ?>
        <ul class='liste'>
        <?php
        foreach($xml->channel->item as $entry) {
          $categories = $entry->category;
          $nb = count($categories);
          ?>
          <li class='theUrl'>
            <a href='<?= $entry->link ?>'><?= $entry->link ?></a>
            <span class='toggleInfos'>
              <span class='title'></span>
            <?php for ($i=0; $i<$nb; $i++){ ?>
              <span class="<?= $entry->title ?> categories"><?= $categories[$i] ?></span>
            <?php } ?>
           <sup class='date'>[<?= $entry->pubDate ?>]</sup>
          </li>
        <?php } ?>
        </ul>
    </div>

    <div class="footer">
      Build by <a href="http://github.com/EtienneOz">ÉtienneOz</a>.<br/>
      Generated with my <a href="http://sebsauvage.net/wiki/doku.php?id=php:shaarli">Shaarli</a> feeds.<br/>
      Under <a href="https://www.gnu.org/licenses/gpl.html">GNU/GPLv3</a> License.<br/>
      <a href="https://github.com/EtienneOz/UrlDropper"> Fork it</a>!
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
    };
  showtitle($('.moreInfos'), $('.lessInfos'), $('.toggleInfos'));
  showtitle($('.moreCredits'), $('.lessCredits'), $('.footer'));
  </script>
  </body>
</html>
