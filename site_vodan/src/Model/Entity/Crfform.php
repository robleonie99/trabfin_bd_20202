<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Crfform Entity
 *
 * @property int $crfform_id
 * @property int $questionnaire_id
 * @property string $description
 *
 * @property \App\Model\Entity\Questionnaire $questionnaire
 */
class Crfform extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'questionnaire_id' => true,
        'description' => true,
        'questionnaire' => true,
    ];
}
