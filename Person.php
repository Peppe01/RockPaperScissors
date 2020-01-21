<?php
trait Registry {
    function setName($name){
        $this->name = $name;
    }
    function getName(){
        return $this->name;
    }
    function setSurname($surname){
        $this->surname = $surname;
    }
    function getSurname()
    {
        return $this->surname;
    }
    function setBirthday($birthday){
        $this->birthday = $birthday;
    }
    function getBirthday()
    {
        return $this->Birthday;
    }
    function getAge(){
        return $this->age;
    }
}

interface Person {
   public function getName();
   public function setName($name);
   public function getSurname();
   public function setSurname($surname);
   public function getBirthday();
   public function setBirthday($birthday);
   public function getAge();
   public function getcareerInfo();
}

abstract class Bachelor implements Person{
    public $dateBachelor = " ";
    public $voteBachelor = " "; 
    public function setBachelor($dateBachelor, $voteBachelor){
        $this->dateBachelor = $dateBachelor;
        $this->voteBachelor = $voteBachelor;
    }
    public function getBachelor(){
        return $this->dateBachelor;
        return $this->voteBachelor;
    }
}

abstract class Graduated implements Person{
      public $dateGraduate = " ";
      public $voteGraduate = " ";
      public function setGraduate($dateGraduate, $voteGraduate){
          $this->dateGraduate = $dateGraduate;
          $this->voteGraduate = $voteGraduate;
      }
      public function getGraduate(){
        return [$this->dateGraduate, $this->voteGraduate];
      }
}
class PassedSubject {
    public $date = " ";
    public $vote = " ";
    public $nameSubject = " ";

    public function __construct($date, $vote, $nameSubject)
    {
        $this->date = $date;
        $this->vote = $vote;
        $this->nameSubject = $nameSubject;
    }
}

class Student extends Graduated{
    use Registry;

    public $name = " ";
    public $surname = " ";
    public $birthday = " ";
    public $age = " ";
    public $passedSubjects = []; 

    public function __construct($name, $surname, $birthday, $age)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthday = $birthday;
        $this->age = $age;
    }

    public function getcareerInfo(){
        return $this->getcareerInfo;
    }
    public function addPassedSubject($date, $vote, $nameSubject){
      
        $passSubj = new PassedSubject($date, $vote, $nameSubject);
        array_push($this->passedSubjects, $passSubj);
    }
    public function returnSubject(){
        for($i = 0; $i<count($this->passedSubjects); $i++);
        echo $this->passedSubjects[$i]->date.$this->passedSubjects[$i]->vote.$this->passedSubjects[$i]->nameSubject;
    }
  
}
$student1 = new Student("Giuseppe", "Puglia", "25-08-1999", "20");
$student1->addPassedSubject("12-01-2020", "26/30", "Android");
$student2 = new Student("Enrico", "Terranova", "25-08-1960", "20");
$student2->addPassedSubject("07-03-2019", "7/10", "JAVA");
$student3 = new Student("Davide", "Turzo", "15-04-1997", "24");
$student3->addPassedSubject("12-01-2020", "23/30", "Android");
$student1->returnSubject();
$student2->returnSubject();
$student3->returnSubject();
print_r($student1);
print_r($student2);
print_r($student3);

class Teacher extends Bachelor{
    use Registry;

    public $name = " ";
    public $surname = " ";
    public $birthday = " ";
    public $age = " ";
    public $teachSubject = [];

    public function __construct($name, $surname, $birthday, $age)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthday = $birthday;
        $this->age = $age;
    }
    public function getcareerInfo(){
        return $this->getcareerInfo;
    }
    public function addSubject($hours, $Description, $nameSubject){
      
        $subject = new Subject($hours, $Description, $nameSubject);
        array_push($this->teachSubject, $subject);
    }
    public function returnTeachSubject(){
        for($j= 0; $j<count($this->teachSubject); $j++);
        echo $this->teachSubject[$j]->hours.$this->teachSubject[$j]->Description.$this->teachSubject[$j]->nameSubject;
    }
}
$teacher1 = new Teacher("Carlo", "Leonardi", "15-10-1984", "35");
$teacher1->addSubject("80", "COMPLICATO, PERO' LA DEFINIZIONE SONO UN MOSTRO", "Angular");
$teacher1->addSubject("20", "DIFFICILE", "JAVA");
$teacher1->addSubject("60", "JAVASCRIPT E' JAVA UNITO CON SCRIPT", "JAVASCRIPT");
$teacher2 = new Teacher("Giuseppe", "Grasso", "06-04-1983", "36");
$teacher2->addSubject("55", "STO FACENDO ESERCIZIO", "PHP");
$teacher3 = new Teacher("Alberto", "Longo", "28-11-1994", "25");
$teacher3->addSubject("50", "SONO PROO", "Android");
$teacher1->returnTeachSubject();
$teacher2->returnTeachSubject();
$teacher3->returnTeachSubject();
print_r($teacher1);
print_r($teacher2);
print_r($teacher3);


class Subject{
    public $hours = " ";
    public $Description = " ";
    public $nameSubject = " ";

    public function __construct($hours, $Description, $nameSubject)
    {
        $this->hours = $hours;
        $this->Description = $Description;
        $this->nameSubject = $nameSubject;
    }
}
?>