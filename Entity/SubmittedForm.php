<?php

namespace Pirastru\FormBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Pirastru\FormBuilderBundle\Entity\SubmittedValue;

/**
 * @ORM\Entity
 * @ORM\Table(name="form__builder_submitted")
 * @ORM\HasLifecycleCallbacks()
 */
class SubmittedForm implements SubmittedFormInterface
{
    /**
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
    * @ORM\Column(type="datetime")
    */
    private $createdAt;
    
    /**
    * @OneToMany(targetEntity="SubmittedValue", mappedBy="SubmittedFormInterface", cascade={"persist"}, fetch="EAGER")
    */
    private $submittedValues;

    /**
    * @ManyToOne(targetEntity="FormInterface", cascade={"persist"})
    */
    private $form;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->submittedValues = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return SubmittedForm
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add submittedValue
     *
     * @param \Pirastru\FormBuilderBundle\Entity\SubmittedValue $submittedValue
     *
     * @return SubmittedForm
     */
    public function addSubmittedValue(\Pirastru\FormBuilderBundle\Entity\SubmittedValue $submittedValue)
    {
        $this->submittedValues[] = $submittedValue;
        $submittedValue->setSubmittedForm($this);
        return $this;
    }

    /**
     * Remove submittedValue
     *
     * @param \Pirastru\FormBuilderBundle\Entity\SubmittedValue $submittedValue
     */
    public function removeSubmittedValue(\Pirastru\FormBuilderBundle\Entity\SubmittedValue $submittedValue)
    {
        $this->submittedValues->removeElement($submittedValue);
    }

    /**
     * Get submittedValues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubmittedValues()
    {
        return $this->submittedValues;
    }
        
    /**
     * Set form
     *
     * @param \Pirastru\FormBuilderBundle\Entity\FormInterface $form
     *
     * @return SubmittedForm
     */
    public function setForm(\Pirastru\FormBuilderBundle\Entity\FormInterface $form = null)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form
     *
     * @return \Pirastru\FormBuilderBundle\Entity\FormInterface
     */
    public function getForm()
    {
        return $this->form;
    }

    
    /**
    * @ORM\PrePersist
    */
    public function prePersist()
    {
        $this->setCreatedAt(new \DateTime());
    }
}
