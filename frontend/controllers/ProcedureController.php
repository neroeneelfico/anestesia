<?php

namespace frontend\controllers;

use common\models\Procedure;
use common\models\SearchProcedure;
use common\models\User;
use common\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProcedureController implements the CRUD actions for Procedure model.
 */
class ProcedureController extends Controller
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
     * Lists all Procedure models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchProcedure();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Procedure model.
     * @param int $idprocedure Idprocedure
     * @param int $idpazienti Idpazienti
     * @param int $idanestesista Idanestesista
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idprocedure, $idpazienti, $idanestesista)
    {
        return $this->render('view', [
            'model' => $this->findModel($idprocedure, $idpazienti, $idanestesista),
        ]);
    }

    /**
     * Creates a new Procedure model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Procedure();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idprocedure' => $model->idprocedure, 'idpazienti' => $model->idpazienti, 'idanestesista' => $model->idanestesista]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Procedure model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idprocedure Idprocedure
     * @param int $idpazienti Idpazienti
     * @param int $idanestesista Idanestesista
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idprocedure, $idpazienti, $idanestesista)
    {
        $model = $this->findModel($idprocedure, $idpazienti, $idanestesista);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idprocedure' => $model->idprocedure, 'idpazienti' => $model->idpazienti, 'idanestesista' => $model->idanestesista]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Procedure model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idprocedure Idprocedure
     * @param int $idpazienti Idpazienti
     * @param int $idanestesista Idanestesista
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idprocedure, $idpazienti, $idanestesista)
    {
        $this->findModel($idprocedure, $idpazienti, $idanestesista)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Procedure model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idprocedure Idprocedure
     * @param int $idpazienti Idpazienti
     * @param int $idanestesista Idanestesista
     * @return Procedure the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idprocedure, $idpazienti, $idanestesista)
    {
        if (($model = Procedure::findOne(['idprocedure' => $idprocedure, 'idpazienti' => $idpazienti, 'idanestesista' => $idanestesista])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
