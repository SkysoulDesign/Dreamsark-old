<div id="idea-submit-modal" class="ui modal">
    <div class="header">
        @lang('idea.submission-form-title')
    </div>
    <div class="content">
        <form id="idea-submit-form" class="ui error form" method="post"
              action="{{ route('project.idea.submission.store', $idea->id) }}">

            {{ csrf_field() }}

            @include('partials.select', ['name' => 'visibility', 'collection' => [0=>'Private', 1=>'Public']])
            @include('partials.textarea', ['name' => 'content', 'label' => trans('forms.description')])

        </form>
    </div>
    <div class="actions">
        <div class="ui black deny button">
            @lang('forms.cancel')
        </div>
        <div class="ui positive right labeled icon button">
            @lang('forms.submit')
            <i class="checkmark icon ok"></i>
        </div>
    </div>
</div>