<x-layout>
    <x-page-heading>New Job</x-page-heading>
    <x-forms.form method="post" action="/jobs">
        <x-forms.input label="Title" name="title" placeholder="CEO"/>
        <x-forms.input label="Salary" name="salary" placeholder="$89,000 USD"/>
        <x-forms.input label="Location" name="location" placeholder="Abuja, Nigeria"/>
        <x-forms.select label="Schedule" name="schedule">
            <option value="" selected disabled>Select Option</option>
            <option value="Part Time">Part Time</option>
            <option value="Full Time">Full Time</option>
        </x-forms.select>
        <x-forms.input label="URL" name="url" placeholder="http://yoursite.ext/job-i-posted"/>
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured"/>
        <x-forms.divider/>
        <x-forms.input label="Tags (Comma separated)" name="tags" placeholder="frontend,devOps"/>
        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
