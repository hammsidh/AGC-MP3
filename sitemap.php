<?php
error_reporting(0);
header('Content-type: text/xml; charset=utf-8');
include'fungsi.php';
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<?xml-stylesheet href="//'.$_SERVER['HTTP_HOST'].'/sitemap.xsl" type="text/xsl"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
$filename = 'map.txt';
$urls = file($filename);
$filectime = filectime($filename);
$urls = array_map('trim',$urls);
$sitemap = array();
foreach($urls as $url) {
if ($url != '') {
$priority = '0.8';
$url='http://'.$_SERVER['HTTP_HOST'].'/video/'.$url;
$sitemap[] = array(
'loc' => $url,
'lastmod' => date('Y-m-d',$filectime),
'changefreq' => 'weekly',
'priority' => $priority,
);
}
}
echo "\n";
foreach ($sitemap as $link) {
echo "\t<url>\n";
echo "\t\t<loc>" . htmlentities($link['loc']) . "</loc>\n";
echo "\t\t<lastmod>{$link['lastmod']}</lastmod>\n";
echo "\t\t<changefreq>{$link['changefreq']}</changefreq>\n";
echo "\t\t<priority>{$link['priority']}</priority>\n";
echo "\t</url>\n";
}
echo'</urlset>';
?>