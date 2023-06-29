<?php


class tipProject { // setup the class

  //private properties + public methods
  private $name; // property 
  private $fedId;
  private $location;

  public function __construct($name, $fedId, $location){
    $this->name = $name;
    $this->fedId = $fedId;
    $this->location = $location;
  }

  //optional
  // function setInfo($i, $y, $z){ //method
  //   $this->name = $i;
  //   $this->fedId = $y;
  //   $this->location = $z;
  // }

  function get_info_des(){
    return "Project name is $this->name, Federal ID: $this->fedId. It is located in $this->location.";
  }


  function get_projName(){
    return $this->name;
  }

  function get_fedId(){
    return $this->fedId;
  }
};


//substanciate//ctrl+shift+L to change at the same time
$tipProj_1 = new tipProject('High Street', 'CFBD0093', 'Morgantown'); 

// $tipProj_1->setInfo(
//   'Beechurst',
//   'DEC2234',
//   'Morgantown',
// );

//show
echo $tipProj_1->get_info_des()."<br><br>";
echo $tipProj_1->get_projName()."<br><br>";
echo $tipProj_1->get_fedId()."<br><br>";

//interestingly, tipProject is the parent class! Need to desgin the table scheme first. 

class allProject extends tipProject {
  public $category;
  public function __construct($name, $fedId, $location, $category){
    parent:: __construct($name, $fedId, $location);
    $this->category = $category;
  }

  function getCategory(){
    return $this->category;
  }
};

$allProj_1 = new allProject('Boyers', 'CC3345', 'Star City', 'TIP');

echo $allProj_1->get_projName()."<br><br>";
echo $allProj_1->getCategory()."<br><br>";


