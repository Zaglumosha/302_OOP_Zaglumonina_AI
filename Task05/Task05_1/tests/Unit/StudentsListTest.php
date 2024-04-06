<?php

namespace App;

use PHPUnit\Framework\TestCase;
use App\Student;
use App\StudentsList;

class StudentsListTest extends TestCase
{
    public function testCurrentAndNext(): void
    {
        $studentFirst = new Student();
        $studentFirst->setLast('Волгина')->setFirst('Алина')->setCourse('2')->setGroup('205');

        $studentSecond = new Student();
        $studentSecond->setLast('Романов')->setFirst('Рузвильд')->setCourse('4')->setGroup('402');

        $studentThird = new Student();
        $studentThird->setLast('Гарин')->setFirst('Максим')->setCourse('1')->setGroup('103');

        $studentsList = new StudentsList();
        $studentsList->add($studentFirst);
        $studentsList->add($studentSecond);
        $studentsList->add($studentThird);

        $this->assertSame($studentFirst, $studentsList->current());
        $studentsList->next();
        $this->assertSame($studentSecond, $studentsList->current());
    }

    public function testKey(): void
    {
        $studentFirst = new Student();
        $studentFirst->setLast('Волгина')->setFirst('Алина')->setCourse('2')->setGroup('205');

        $studentSecond = new Student();
        $studentSecond->setLast('Романов')->setFirst('Рузвильд')->setCourse('4')->setGroup('402');

        $studentThird = new Student();
        $studentThird->setLast('Гарин')->setFirst('Максим')->setCourse('1')->setGroup('103');
		
        $studentsList = new StudentsList();
        $studentsList->add($studentFirst);
        $studentsList->add($studentSecond);
        $studentsList->add($studentThird);

        $this->assertSame($studentFirst->getId(), $studentsList->key());
    }

    public function testRewind(): void
    {
		$studentFirst = new Student();
        $studentFirst->setLast('Волгина')->setFirst('Алина')->setCourse('2')->setGroup('205');

        $studentSecond = new Student();
        $studentSecond->setLast('Романов')->setFirst('Рузвильд')->setCourse('4')->setGroup('402');

        $studentThird = new Student();
        $studentThird->setLast('Гарин')->setFirst('Максим')->setCourse('1')->setGroup('103');
		
        $studentsList = new StudentsList();
        $studentsList->add($studentFirst);
        $studentsList->add($studentSecond);
        $studentsList->add($studentThird);

        $studentsList->next();
        $studentsList->next();
        $studentsList->rewind();

        $this->assertSame($studentFirst, $studentsList->current());
    }

    public function testValid(): void
    {
        $studentFirst = new Student();
        $studentFirst->setLast('Волгина')->setFirst('Алина')->setCourse('2')->setGroup('205');

        $studentSecond = new Student();
        $studentSecond->setLast('Романов')->setFirst('Рузвильд')->setCourse('4')->setGroup('402');

        $studentThird = new Student();
        $studentThird->setLast('Гарин')->setFirst('Максим')->setCourse('1')->setGroup('103');
		
        $studentsList = new StudentsList();
        $studentsList->add($studentFirst);
        $studentsList->add($studentSecond);
        $studentsList->add($studentThird);

        $studentsList->next();
        $studentsList->next();
        $studentsList->next();

        $this->assertFalse($studentsList->valid());
    }
}
