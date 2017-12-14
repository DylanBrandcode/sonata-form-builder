<?php

namespace Pirastru\FormBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity
 * @ORM\Table(name="form__builder_field_value")
 */
class SubmittedValue{

     /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
        
    /**
    * @ORM\Column(type="string")
    */
    private $fieldKey;

    /**
    * @ORM\Column(type="string")
    */
    private $fieldValue;

    /**
    * @ManyToOne(targetEntity="SubmittedForm")
    */    
    private $submittedForm; 

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fieldValue
     *
     * @param string $fieldValue
     *
     * @return FormFieldValue
     */
    public function setFieldValue($fieldValue)
    {
        $this->fieldValue = $fieldValue;

        return $this;
    }

    /**
     * Get fieldValue
     *
     * @return string
     */
    public function getFieldValue()
    {
        return $this->fieldValue;
    }

    /**
     * Get fieldKey
     *
     * @return string
     */
    public function getFieldKey()
    {
        return $this->fieldKey;
    }
    /**
     * Set fieldKey
     *
     * @param string $fieldKey
     *
     * @return FormFieldValue
     */
    public function setFieldKey($fieldKey)
    {
        $this->fieldKey = $fieldKey;

        return $this;
    }

    /**
     * Set submittedForm
     *
     * @param \Pirastru\FormBuilderBundle\Entity\SubmittedForm $submittedForm
     *
     * @return FormFieldValue
     */
    public function setSubmittedForm(\Pirastru\FormBuilderBundle\Entity\SubmittedForm $submittedForm = null)
    {
        $this->submittedForm = $submittedForm;

        return $this;
    }

    /**
     * Get submittedForm
     *
     * @return \Pirastru\FormBuilderBundle\Entity\SubmittedForm
     */
    public function getSubmittedForm()
    {
        return $this->submittedForm;
    }

    public function __toString()
    {
        return $this->getFieldKey() ." ".  $this->getFieldValue();
    }
}
