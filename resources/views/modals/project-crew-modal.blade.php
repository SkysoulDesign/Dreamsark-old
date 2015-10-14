<div id="project-crew-modal" class="ui modal">
    <div class="header">
        @lang('project.add-crew')
    </div>
    <div class="content">
        <form id="project-crew-form" class="ui error form" method="post"
              action="{{ route('project.crew.store', $project->id) }}">

            {{ csrf_field() }}

            @include('partials.field', ['name' => 'role', 'label'=> trans('forms.role'), 'placeholder'=> trans('forms.role')])
            @include('partials.field', ['name' => 'salary', 'label'=> trans('forms.salary'), 'placeholder'=> trans('forms.salary')])

            @include('partials.textarea', ['name' => 'description', 'label' => trans('project.description')])

        </form>
    </div>
    <div class="actions">
        <div class="ui black deny button">
            @lang('forms.cancel')
        </div>
        <div class="ui positive right labeled icon button">
            @lang('forms.add')
            <i class="checkmark icon ok"></i>
        </div>
    </div>
</div>