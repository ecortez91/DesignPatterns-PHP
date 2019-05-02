<?php

interface Strategy 
{
   public function doOperation(int $num1, int $num2) : int;
}

class OperationAdd implements Strategy
{
   public function  doOperation(int $num1, int $num2) : int 
   {
      return $num1 + $num2;
   }
}

class OperationSubstract implements Strategy
{
   public function doOperation(int $num1, int $num2) : int 
   {
      return $num1 - $num2;
   }
}

class OperationMultiply implements Strategy
{
   public function doOperation(int $num1, int $num2)  : int 
   {
      return $num1 * $num2;
   }
}

class OperationDivide implements Strategy
{
   public function doOperation(int $num1, int $num2)  : int 
   {
      return intdiv($num1, $num2);
   }
}

class Context 
{
   private $strategy;

   public function __construct(Strategy $strategy) 
   {
      $this->strategy = $strategy;
   }

   public function executeStrategy(int $num1, int $num2) : int 
   {
      return $this->strategy->doOperation($num1, $num2);
   }
}

$context = new Context(new OperationAdd());		
echo "The result of 10 + 5 is: " . $context->executeStrategy(10, 5) . "<br>";

$context = new Context(new OperationSubstract());		
echo "The result of 10 - 5 is: " . $context->executeStrategy(10, 5) . "<br>";

$context = new Context(new OperationMultiply());		
echo "The result of 10 * 5 is: " . $context->executeStrategy(10, 5) . "<br>";

$context = new Context(new OperationDivide());		
echo "The result of 10 / 3 is: " . $context->executeStrategy(10, 3) . "<br>";
?>