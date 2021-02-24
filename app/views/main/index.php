<?

/**
 * @var $params
 * @var $title
 */

?>
<h1>Index</h1>
<?
foreach ($params as $news): ?>
    <h3><?= $news['title'] ?></h3>
    <p><?= $news['description'] ?></p>
<?
endforeach; ?>
