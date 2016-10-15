<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class UploadExcel extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/products.' . $this->imageFile->extension);
            return Yii::$app->response->redirect('updatedb');
        } else {
            return false;
        }
    }
}