<?php

/**
 * This is the model class for table "usuario_examen".
 *
 * The followings are the available columns in table 'usuario_examen':
 * @property integer $id
 * @property integer $usuario_id
 * @property integer $examen_id
 * @property string $respuesta
 * @property string $nota
 * @property string $hasta
 * @property string $fecha
 * @property integer $estado
 */
class UsuarioExamen extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_examen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario_id, examen_id', 'required', 'message' => '{attribute} no debe estar vacio.'),
			array('usuario_id, examen_id, estado', 'numerical', 'integerOnly'=>true,'message' => '{attribute} solo debe ser numeros.'),
			array('nota', 'length', 'max'=>18),
			array('respuesta, hasta, fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, usuario_id, examen_id, respuesta, nota, hasta, fecha, estado', 'safe', 'on'=>'search'),
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
			'usuario_id' => 'Usuario',
			'examen_id' => 'Examen',
			'respuesta' => 'Respuesta',
			'nota' => 'Nota',
			'hasta' => 'Hasta',
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
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('examen_id',$this->examen_id);
		$criteria->compare('respuesta',$this->respuesta,true);
		$criteria->compare('nota',$this->nota,true);
		$criteria->compare('hasta',$this->hasta,true);
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
	 * @return UsuarioExamen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
