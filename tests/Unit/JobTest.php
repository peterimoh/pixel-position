<?php

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

//class JobTest extends TestCase
//{
//    use RefreshDatabase;
//
//    public function testJobBelongsToEmployer()
//    {
//        $employer = Employer::factory()->create();
//        $job = Job::factory()->create(['employer_id' => $employer->id]);
//
//        expect($job->employer->is($employer))->toBeTrue();
//    }
//
//}

it('it should belong to an employer', function () {
    /// AAA

    // Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create(['employer_id' => $employer->id]);

    // Act and asset
    expect($job->employer->is($employer))->toBeTrue();
});

it('can have tags', function (){
    $job = Job::factory()->create();
    $job->tag('Frontend');
    expect($job->tags)->toHaveCount(1);
});
