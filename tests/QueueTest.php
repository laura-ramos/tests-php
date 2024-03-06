<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Depends;

class QueueTest extends TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue;
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0,$this->queue->getCount());
        
        return $this->queue;
    }

    #[Depends('testNewQueueIsEmpty')]
    public function testAnItemIsAddedToTheQueue()
    {
        $this->queue->push('green');
        
        $this->assertEquals(1, $this->queue->getCount());
        
        return $this->queue;
    }
    
    #[Depends('testAnItemIsAddedToTheQueue')]
    public function testAnItemIsRemovedFromTheQueue()
    {
        $item = $this->queue->pop();
        
        $this->assertEquals(0, $this->queue->getCount());
        
        $this->assertEquals('green', $item);
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {

            $this->queue->push($i);
            
        }
        
        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }
    
    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {

            $this->queue->push($i);
            
        }

        $this->expectException(QueueException::class);
        
        $this->expectExceptionMessage("Queue is full");
        
        $this->queue->push("wafer thin mint");
    }
}
