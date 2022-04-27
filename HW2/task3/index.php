<?php 
abstract class Figure
{
    public function info() {
        echo "I am a $this->name.";
    }
}

class Rectangle extends Figure
{
    protected $name = "Rectangle";
    public function perimeter($side1, $side2){
        return 2 * ($side1 + $side2);
    }
}
class Circle extends Figure
{
    protected $name = "Circle";
    public function perimeter($radius){
        return 2 * M_PI * $radius;
    }
}
class Triangle extends Figure
{
    protected $name = "Triangle";   
    public function perimeter($side1, $side2, $side3){
        return ($side1 + $side2 + $side3);
    }
}

echo (new Circle())->perimeter(2);
echo "<br>";
echo (new Triangle())->perimeter(3, 4, 5);
echo "<br>";
echo (new Rectangle())->perimeter(3, 2);
echo "<br>";
(new Circle())->info();


