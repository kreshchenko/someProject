<?php
    echo 'Вы в кабинете';
    echo '<a href="/logout/">Выйти</a>';
?>

<form action="/cabinet/" method="POST">
    Ссыка на РСС страницу: <input name="rssUrl" title="Ссылка на RSS страницу">
    <br>
    Название ресурса: <input name="name" title="Название рессурса">
    <br>
    <input type="submit" value="Добавить">
</form>

<?php
    require_once '../models/Rss.php';
    
    $rss = new RSS();
    
    $RSS = $rss->listRss();

    foreach ($RSS as $item){
        echo '<pre>';
        echo $item['name'].': '.$item['link'].PHP_EOL;
        echo '</pre>';
    }          

