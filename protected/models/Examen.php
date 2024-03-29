<?php

/**
 * This is the model class for table "examen".
 *
 * The followings are the available columns in table 'examen':
 * @property integer $id
 * @property string $titulo
 * @property integer $tipo_id
 * @property integer $tipo_calificacion
 * @property integer $tipo_examen
 * @property integer $puntaje_positivo
 * @property integer $puntaje_negativo
 * @property integer $timer
 * @property integer $random
 * @property string $fecha
 * @property integer $estado
 */
class Examen extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'examen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_id', 'required', 'message' => '{attribute} no debe estar vacio.'),
			array('tipo_id, tipo_calificacion, tipo_examen, puntaje_positivo, puntaje_negativo, timer, random, estado', 'numerical', 'integerOnly'=>true,'message' => '{attribute} solo debe ser numeros.'),
			array('titulo', 'length', 'max'=>255),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, tipo_id, tipo_calificacion, tipo_examen, puntaje_positivo, puntaje_negativo, timer, random, fecha, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'tipo_id' => 'Tipo',
			'tipo_calificacion' => 'Tipo Calificacion',
			'tipo_examen' => 'Tipo Examen',
			'puntaje_positivo' => 'Puntaje Positivo',
			'puntaje_negativo' => 'Puntaje Negativo',
			'timer' => 'Timer',
			'random' => 'Random',
			'fecha' => 'Fecha',
			'estado' => 'Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('tipo_id',$this->tipo_id);
		$criteria->compare('tipo_calificacion',$this->tipo_calificacion);
		$criteria->compare('tipo_examen',$this->tipo_examen);
		$criteria->compare('puntaje_positivo',$this->puntaje_positivo);
		$criteria->compare('puntaje_negativo',$this->puntaje_negativo);
		$criteria->compare('timer',$this->timer);
		$criteria->compare('random',$this->random);
		$criteria->compare('fecha',$this->fecha,true);

		$criteria->order = 'fecha DESC';
		$criteria->compare('estado',$this->estado);

		$criteria->addCondition('estado = TRUE','AND');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Examen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
