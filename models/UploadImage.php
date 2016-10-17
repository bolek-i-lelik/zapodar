<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
use app\model\Slider;

class UploadImage extends Model
{
    /**
     * @var UploadedFile
     */
    public $image;

    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false],
        ];
    }
    
    public function upload($id)
    {
        if ($this->validate()) {
            $this->image->saveAs('img/slider/'.$id.'slide.' . $this->image->extension);
            
            $responce = 'Фото загружено';
            return $responce;
        } else {
            $error = 'Ошибка загрузки';
            return $error;
        }
    }
}