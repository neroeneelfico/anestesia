<?php

namespace frontend\controllers;

use common\models\Pazienti;
use app\models\PazientiSearch;
use common\models\Procedure;
use common\models\SearchProcedure;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PazientiController implements the CRUD actions for Pazienti model.
 */
class PazientiController extends Controller
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
     * Lists all Pazienti models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PazientiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionListaprocedure($id)
    {
        $searchModel = new SearchProcedure();
        $dataProvider = $searchModel->searchProcedura($this->request->queryParams, $id);


        $model = Procedure::find()->where(['idpazienti'=>$id])->one();

        return $this->render('elencoprocedure', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
        ]);
    }

    public function actionProcedurepersonali($idanestesista,$tipoanestesia)
    {
        $searchModel = new SearchProcedure();
        $dataProvider = $searchModel->searchPersProcedura($this->request->queryParams, $idanestesista,$tipoanestesia);


        $model = Procedure::find()->where(['idanestesista'=>$idanestesista,'tipoanestesia'=>$tipoanestesia])->one();

        return $this->render('elencoprocedure', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Pazienti model.
     * @param int $idpazienti Idpazienti
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchPatient = $this->findModel($id);
        return $this->render('view', [
            'model' => $searchPatient,
        ]);
    }

    /**
     * Creates a new Pazienti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pazienti();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pazienti model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idpazienti Idpazienti
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idpazienti)
    {
        $model = $this->findModel($idpazienti);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpazienti' => $model->idpazienti]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pazienti model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idpazienti Idpazienti
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pazienti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idpazienti Idpazienti
     * @return Pazienti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idpazienti)
    {
        if (($model = Pazienti::findOne($idpazienti)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
