<?php

namespace app\controllers;

use app\models\Knowledge;
use app\models\KnowledgeProgram;
use app\models\KnowledgeSearch;
use DOMDocument;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KnowledgeController implements the CRUD actions for Knowledge model.
 */
class KnowledgeController extends Controller
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
     * Lists all Knowledge models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KnowledgeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Knowledge model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Knowledge model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new KnowledgeProgram();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $dom = new DOMDocument();
            $knowledge = [];
            $dom->loadHTML("\xEF\xBB\xBF" . $model->knowledge);
            foreach($dom->getElementsByTagName('p') as $node)
                $knowledge[] = filter_var(trim($dom->saveHTML($node)), FILTER_SANITIZE_STRING);
            foreach($dom->getElementsByTagName('li') as $node)
                $knowledge[] = filter_var(trim($dom->saveHTML($node)), FILTER_SANITIZE_STRING);
            print_r($knowledge);
            foreach ($knowledge as $item) {
                $k_l = new Knowledge();
                $k_l->id_program = $model->discipline;
                $k_l->name = $item;
                $k_l->save();
            }
            return $this->redirect(['program/view', 'id' => $model->discipline]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Knowledge model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Knowledge model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Knowledge model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Knowledge the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Knowledge::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('all', 'The requested page does not exist.'));
    }
}
