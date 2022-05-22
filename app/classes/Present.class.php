<?php

class Present
{
  private $presentName;
  private PresentRepository $presentRepository;

  public function __construct(string $presentName, PresentRepository $presentRepository)
  {
    $this->presentName = $presentName;
    $this->presentRepository = $presentRepository;
  }
  
  /**
   * add
   * adds it to presentList, then returns presentList array
   * @return array
   */
  public function add(): array
  {
    $this->presentRepository->storePresent($this->presentName);
    return $this->presentRepository->getPresentArray();
  }
}
