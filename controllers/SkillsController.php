<?php

namespace app\controllers;

use app\models\Skills;
use app\models\SkillsProgram;
use app\models\SkillsSearch;
use DOMDocument;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SkillsController implements the CRUD actions for Skills model.
 */
class SkillsController extends Controller
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
     * Lists all Skills models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SkillsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Skills model.
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
     * Creates a new Skills model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SkillsProgram();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $dom = new DOMDocument();
            $skills = [];
            $dom->loadHTML("\xEF\xBB\xBF" . $model->skills);
            foreach($dom->getElementsByTagName('p') as $node)
                $skills[] = filter_var(trim($dom->saveHTML($node)), FILTER_SANITIZE_STRING);
            foreach($dom->getElementsByTagName('li') as $node)
                $skills[] = filter_var(trim($dom->saveHTML($node)), FILTER_SANITIZE_STRING);
            foreach ($skills as $item) {
                $sk = new Skills();
                $sk->id_program = $model->discipline;
                $sk->name = $item;
                $sk->save();
            }
            return $this->redirect(['program/view', 'id' => $model->discipline]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Skills model.
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
     * Deletes an existing Skills model.
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
     * Finds the Skills model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Skills the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Skills::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('all', 'The requested page does not exist.'));
    }
}
