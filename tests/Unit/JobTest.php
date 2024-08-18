<?php

use App\Models\Employer;
use App\Models\Job;

it('it should belong to an employer', function () {
    /// AAA

    // Arrange
   $employer = Employer::factory()->create();
   $job = Job::factory()->create(['employer_id' => $employer->id]);

   // Act and asset
    expect($job->employer->is($employer))->toBeTrue();
});
