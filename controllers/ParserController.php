<?php
namespace app\controllers;

use Yii;
use GuzzleHttp\Client; // подключаем Guzzle
use yii\helpers\Url;

class ParserController extends \yii\web\Controller
{
    public function actionYandex() 
    {
         // создаем экземпляр класса
        $client = new Client();
        //Работа с сайтом Oasis
        // отправляем запрос к странице Яндекса
        $res = $client->request('GET', 'http://www.oasiscatalog.com/production/dishes?per-page=404');
        // получаем данные между открывающим и закрывающим тегами body
        $body = $res->getBody();
        // подключаем phpQuery
        $document = \phpQuery::newDocumentHTML($body);
        // получаем список новостей
        $news = $document->find(".tovar-item"); 
        $links = $news->find("a");
        $product_links = array();
        foreach ($links as $value) {
            $product_links[] = $value->getAttribute('href');
        }
        $product_links = array_unique($product_links);
        foreach ($product_links as $value) {
            $str = substr($value, 0, 5);
            if($str !== '/item'){
                $product_links = array_flip($product_links); //Меняем местами ключи и значения
                unset ($product_links[$value]) ; //Удаляем элемент массива
                $product_links = array_flip($product_links); //Меняем местами ключи и значения
            }
        }
        foreach ($product_links as $value) {
            $site = $client->request('GET', 'http://www.oasiscatalog.com'.$value);
            $body = $site->getBody();
            $document = \phpQuery::newDocumentHTML($body);
            $info = $document->find(".breadbox");
            $name = $info->find("h1");
            $name = (String)$name
            ;
            echo strip_tags($name).'<br/>';
        }
        exit();
        //var_dump($product_links);exit();
        // выполняем проход циклом по списку
        /*foreach ($news as $elem) {
            //pq аналог $ в jQuery
             $pq = pq($elem);
             // удалим первую новость в списке
             $pq->find('li.b-news-list__item:first')->remove();
             // выполним поиск в скиске ссылок
             $tags = $pq->find('li.b-news-list__item a');
             // добавим ковычки в начало и в конец предложения
             $tags->append('" ')->prepend(' "'); //
             // добавим свой класс к последней новости списка
             $pq->find('li.b-news-list__item:last')->addClass('my_last_class');
        }*/
        // вывод списка новостей яндекса с главной страницы в представление
        return $this->render('yandex', [
            'links' => $links,
            'news' => $news,
            'body' => $body,
            'link' => $link,
        ]);
    }
    
}

/* Вот доступы на сайты поставщиков откуда мы брали данные:

http://api2.gifts.ru/
имя пользователя - 25109_xmlexport 
пароль  - NEdToHF3 
но здесь есть ограничения по IP-адресу

http://happygifts.ru/
hg7703799862
mediadeko
[17:20:48] Сергей: http://www.oasiscatalog.com/
info@za-podar.com
110S4v7H
[17:23:57] Сергей: есть ещё практически не обновляемый http://norgispress.ru/calculator/ 
его цены уже год как не менялись. Там просто по прайсу всё вручную было занесено
http://vip.oasiscatalog.com/