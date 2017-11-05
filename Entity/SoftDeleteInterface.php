<?php

namespace Vaszev\CrudLteBundle\Entity;

/**
 * Interface to support soft delete.
 */
interface SoftDeleteInterface {
  /**
   * Gets the deleted property.
   * @return \DateTime
   */
  public function getDeleted();



  /**
   * Sets the deleted property.
   * @param mixed $deleted
   */
  public function setDeleted(\DateTime $deleted = null);
}
