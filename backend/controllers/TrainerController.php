<?php

namespace backend\controllers;

use backend\models\Trainer;
use backend\models\TrainerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TrainerController implements the CRUD actions for Trainer model.
 */
class TrainerController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Trainer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrainerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trainer model.
     * @param int $t_id T ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Trainer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trainer();

        $trainer_image = UploadedFile::getInstance($model, 'imageUrl');

        if ($model->load($this->request->post())) {

            if ($trainer_image != '') {
                $trainer_image->saveAs('trainerImage/'. $trainer_image->baseName . '.' . $trainer_image->extension);
                $model->imageUrl = $trainer_image->baseName . '.' . $trainer_image->extension;
            } else {
                $model->imageUrl = 'default.jpg';
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->t_id]);
            
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trainer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $t_id T ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $savedImage = $model->imageUrl;

        if ($model->load($this->request->post())) {

            $trainer_image = UploadedFile::getInstance($model, 'imageUrl');
            
            if($trainer_image)
            {
                $model->imageUrl = $trainer_image->baseName . '.' . $trainer_image->extension;
                $trainer_image->saveAs('trainerImage/'. $trainer_image->baseName . '.' . $trainer_image->extension);
                               
            }
            else {
                $model->imageUrl = $savedImage;
            }
            
        $model->save();
        return $this->redirect(['view', 'id' => $model->t_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trainer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $t_id T ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trainer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $t_id T ID
     * @return Trainer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trainer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
