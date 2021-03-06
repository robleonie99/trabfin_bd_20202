<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuestionGroupsFormsRecords Model
 *
 * @property \App\Model\Table\FormRecordsTable&\Cake\ORM\Association\BelongsTo $FormRecords
 * @property \App\Model\Table\CrfformsTable&\Cake\ORM\Association\BelongsTo $Crfforms
 * @property \App\Model\Table\QuestionsTable&\Cake\ORM\Association\BelongsTo $Questions
 * @property \App\Model\Table\ListOfValuesTable&\Cake\ORM\Association\BelongsTo $ListOfValues
 *
 * @method \App\Model\Entity\QuestionGroupsFormsRecord get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuestionGroupsFormsRecord newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\QuestionGroupsFormsRecord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuestionGroupsFormsRecord|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuestionGroupsFormsRecord saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuestionGroupsFormsRecord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuestionGroupsFormsRecord[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuestionGroupsFormsRecord findOrCreate($search, callable $callback = null, $options = [])
 */
class QuestionGroupsFormsRecordsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('question_groups_forms_records');
        $this->setDisplayField('answer');
        $this->setPrimaryKey('questionGroupFormRecordID');

        $this->belongsTo('FormRecords', [
            'foreignKey' => 'form_record_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Crfforms', [
            'foreignKey' => 'crfform_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ListOfValues', [
            'foreignKey' => 'list_of_value_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('questionGroupFormRecordID')
            ->allowEmptyString('questionGroupFormRecordID', null, 'create');

        $validator
            ->scalar('answer')
            ->maxLength('answer', 512)
            ->allowEmptyString('answer');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['form_record_id'], 'FormRecords'));
        $rules->add($rules->existsIn(['crfform_id'], 'Crfforms'));
        $rules->add($rules->existsIn(['question_id'], 'Questions'));
        $rules->add($rules->existsIn(['list_of_value_id'], 'ListOfValues'));

        return $rules;
    }
}
