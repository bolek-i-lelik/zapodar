<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\User;
use yii\web\Controller;
use app\controllers\DostupController;
use app\models\Config;
use app\models\Zakaz;
use app\models\Users;


class MediaController extends \yii\web\Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index', 'articles', 'uploadXML', 'catfoto', 'updatedb', 'upload', 'uploadproducts', 'uploadxmlfromnet', 'uploadxml'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['articles'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['uploadXML'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['catfoto'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['updatedb'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['uploadproducts'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['uploadxmlfromnet'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

  	public $layout = 'admin';

    public function actionIndex()
    {
        $dir = Yii::$app->basePath.'/web/img';
        $dir_foto = '/img';
        $files = array();
        $files = scandir($dir);
        return $this->render('index',[
            'files' => $files,
            'dir' => $dir,
            'dir_foto' => $dir_foto,
        ]);

    }

    public function actionOpendir()
    {
        if(Yii::$app->request->isPOST ){
            $postquery = Yii::$app->request->post();
            $dir = $postquery['dir'];
            $dir_foto = '/img/'.$postquery['dir_new'];
            $files = scandir($dir);
            
            $count = 0;
            $files_res = array();
            foreach ($files as $file) {
                $count += 1;
                if($count > 2){
                    if(!stristr($file, '.')){
                        $files_res[] = $file;
                    }
                }
            }
            $count = 0;
            $dirs = array();
            foreach ($files as $file) {
                $count += 1;
                if($count > 2){
                    if(stristr($file, '.')){
                        $dirs[] = $file;
                    }
                }
            }

            $result = array();
            $result['files'] = $dirs;
            $result['dirs'] = $files_res;
            $result['dir'] = $dir;
            $result['dir_foto'] = $dir_foto;
            $result = json_encode($result);

            return $result;
        } 
    }

    public function actionAddnewdir()
    {
        if(Yii::$app->request->isPOST ){
            $postquery = Yii::$app->request->post();
            $name = $postquery['name'];

            $dir = Yii::$app->basePath.'/web/img/'.$name;

            if (!mkdir($dir, 0777)) {
                return 'Всё плохо!';
            }else{
                return 'OK';
            }
        }
    }

    public function actionUpload()
    {
        if(Yii::$app->request->isPOST){
            $query = Yii::$app->request->post();

            $image = explode('base64,',$query['file']); 
            
            $fileText = base64_decode($image[1]);

            $dir = $query['dir'];

            $core = dirname(Yii::$app->basePath);
            $files_dir = $core.'/dm'.$dir;
            
            $dira = $files_dir.'/'.$query['fileName'];
            
            //Проверяем наличие директории с документами
            if (file_exists($files_dir)) {
                echo 'ghbdtn';
                // открываем файл, если файл не существует,
                //делается попытка создать его
                $fp = fopen($dira, "w");
                         
                // записываем в файл текст
                fwrite($fp, $fileText);
                         
                // закрываем
                fclose($fp);    
            }
            
            
            return $dira;
        }
    }
}