<?php
interface TravelStrategy
{
    public function travel();
}

class BusTravelStrategy implements TravelStrategy
{
    public function travel()
    {
        return 'travel by Bus';
    }
}

class TrainTravelStrategy implements TravelStrategy
{
    public function travel()
    {
        return 'travel by Train';
    }
}

class PlaneTravelStrategy implements TravelStrategy
{
    public function travel()
    {
        return 'travel by Plane';
    }
}

$strategy = new TrainTravelStrategy();

echo $strategy->travel(); // Output: travel by Train