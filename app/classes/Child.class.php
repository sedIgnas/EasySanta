<?php

class Child
{
  private string $fullName;
  private ChildRepository $childRepository;


  public function __construct(string $fullName, ChildRepository $childRepository)
  {
    $this->fullName = $fullName;
    $this->childRepository = $childRepository;
  }
  
  /**
   * add
   * checks user input, if child name is unique stores it in childrenList
   * @return array
   */
  public function add(): array
  {
    if($this->childAlreadyExistsChildRepository()){
      return [];
    }
    $this->childRepository->storeChild($this->fullName);
    return $this->childRepository->getChildrenArray();
  }
 
  /**
   * childAlreadyExistsChildRepository
   * checks if child already exists in repository array
   * @return bool
   */
  private function childAlreadyExistsChildRepository(): bool
  {
    return in_array($this->fullName, $this->childRepository->getChildrenArray());
  }
  
}
