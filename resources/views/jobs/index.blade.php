<x-layout>
    <div class="space-y-10">

        <section class="text-center pt-6">
            <h1 class="capitalize font-bold text-4xl">Let's find your next job</h1>

            <x-forms.form method="GET" class="mt-6" action="/search">
                <x-forms.input :label="false" type="text" placeholder="Web Developer..." name="q" class="rounded-xl bg-white/5 border-white/10 px-5 py-4 w-full max-w-xl"/>
            </x-forms.form>
        </section>

        <section class="pt-10">
            <x-section-heading>Top Jobs</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach($featuredJobs as $job)
                    <x-job-card :$job />
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="space-x-2 mt-6">
                @foreach($tags as $tag)
                    <x-tag :$tag />
                @endforeach

            </div>
        </section>


        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="space-y-6 mt-6">
                @foreach($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
