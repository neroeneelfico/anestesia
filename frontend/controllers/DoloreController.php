<?php

namespace frontend\controllers;

use common\models\Dolore;
use common\models\SearchDolore;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DoloreController implements the CRUD actions for Dolore model.
 */
class DoloreController extends Controller
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
     * Lists all Dolore models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchDolore();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dolore model.
     * @param int $iddolore Iddolore
     * @param int $idprocedure Idprocedure
     * @param int $idanestesista Idanestesista
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($iddolore, $idprocedure, $idanestesista)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddolore, $idprocedure, $idanestesista),
        ]);
    }

    /**
     * Creates a new Dolore model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dolore();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'iddolore' => $model->iddolore, 'idprocedure' => $model->idprocedure, 'idanestesista' => $model->idanestesista]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dolore model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $iddolore Iddolore
     * @param int $idprocedure Idprocedure
     * @param int $idanestesista Idanestesista
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($iddolore, $idprocedure, $idanestesista)
    {
        $model = $this->findModel($iddolore, $idprocedure, $idanestesista);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddolore' => $model->iddolore, 'idprocedure' => $model->idprocedure, 'idanestesista' => $model->idanestesista]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Dolore model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $iddolore Iddolore
     * @param int $idprocedure Idprocedure
     * @param int $idanestesista Idanestesista
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($iddolore, $idprocedure, $idanestesista)
    {
        $this->findModel($iddolore, $idprocedure, $idanestesista)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dolore model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $iddolore Iddolore
     * @param int $idprocedure Idprocedure
     * @param int $idanestesista Idanestesista
     * @return Dolore the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddolore, $idprocedure, $idanestesista)
    {
        if (($model = Dolore::findOne(['iddolore' => $iddolore, 'idprocedure' => $idprocedure, 'idanestesista' => $idanestesista])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
