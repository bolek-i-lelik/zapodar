<?php
 
namespace app\controllers;
 
use yii\web\Controller;
use Yii;
use app\models\Articles;
use app\models\Category;
use app\models\News;
use app\models\Products;   

 
class SitemapController extends Controller
{
 
    public function actionIndex()
    {
 
        if (!$xml_sitemap = Yii::$app->cache->get('sitemap')) {  // проверяем есть ли закэшированная версия sitemap
            $urls = array();

            //Главная страница
            $urls[] = array(
                '/', 
                'daily'
            );
 
            // Выбираем категории сайта
            $categories = Category::find()->all();
            foreach ($categories as $category) {
                $urls[] = array(
                    Yii::$app->urlManager->createUrl(['/category/' . $category->id]),
                    'daily'
                );
            }

            //Выбираем продукты
            $products = Products::find()->all();
            foreach ($products as $product) {
                $urls[] = array(
                    Yii::$app->urlManager->createUrl(['/product/' . $product->id . $product->alias]),
                    'daily'
                );
            }            

            //Выбираем новости
            $news = News::find()->all();
            foreach ($news as $new) {
                $urls[] = array(
                    Yii::$app->urlManager->createUrl(['/new/' . $new->alias]),
                    'daily'
                );
            }

            //Выбираем статьи
            $articles = Articles::find()->all();
            foreach ($articles as $article) {
                $urls[] = array(
                    Yii::$app->urlManager->createUrl(['/' . $article->alias]),
                    'daily'
                );
            }

            /*$xml_sitemap = $this->renderPartial('index', array( // записываем view на переменную для последующего кэширования
                'host' => Yii::$app->request->hostInfo,         // текущий домен сайта
                'urls' => $urls,                                // с генерированные ссылки для sitemap
            ));
 
            Yii::$app->cache->set('sitemap', $xml_sitemap, 3600*12); // кэшируем результат, чтобы не нагружать сервер и не выполнять код при каждом запросе карты сайта.*/
        }

        $host = Yii::$app->request->hostInfo;
        unlink('sitemap.xml');
        $file = 'sitemap.xml';
        // Новый человек, которого нужно добавить в файл
        $str = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        // Пишем содержимое в файл,
        // используя флаг FILE_APPEND flag для дописывания содержимого в конец файла
        // и флаг LOCK_EX для предотвращения записи данного файла кем-нибудь другим в данное время
        file_put_contents($file, $str, FILE_APPEND | LOCK_EX);

        $str = "<urlset xmlns=\"https://www.sitemaps.org/schemas/sitemap/0.9\">\n";
        file_put_contents($file, $str, FILE_APPEND | LOCK_EX);
        foreach($urls as $url){
            $str = "<url>\n";
            file_put_contents($file, $str, FILE_APPEND | LOCK_EX);
            $str = "<loc>". $host . $url[0] . "</loc>\n";
            file_put_contents($file, $str, FILE_APPEND | LOCK_EX);
            $str = "<changefreq>" . $url[1] . "</changefreq>\n";
            file_put_contents($file, $str, FILE_APPEND | LOCK_EX);
            $str = "<priority>0.5</priority>\n";
            file_put_contents($file, $str, FILE_APPEND | LOCK_EX);
            $str = "</url>\n";
        }
        $str = "</urlset>\n";
        file_put_contents($file, $str, FILE_APPEND | LOCK_EX);



        
        /*header('Content-Type: application/xml');
        //Yii::$app->response->format = \yii\web\Response::FORMAT_XML; // устанавливаем формат отдачи контента
 
        echo $xml_sitemap;*/
        
    }
}