@extends('layouts.master')

@section('content')

    <div class="column">

        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="request">@lang('idea.request')</a>
            <a class="item" data-tab="submissions">@lang('idea.submissions')</a>
        </div>

        <div class="ui bottom attached tab segment active" data-tab="request">
            <div class="ui segments">

                <div class="ui segment">
                    {{ $idea->project->name }}
                </div>

                <div class="ui secondary segment">
                    {{ $idea->content }}
                </div>

                <div class="ui secondary segment">
                    <h3>@lang('idea.reward') ${{ $idea->reward }}</h3>
                </div>

                <div class="ui segment">
                    @lang('idea.number-of-ideas') {{ $idea->submissions->count() }}
                </div>

                <div class="ui segment">
                    asasasasas
                </div>

            </div>

            @if($idea->active)
                <div class="ui segment">
                    <a id="idea-submit-open" href="#" class="ui primary button">
                        @lang('idea.submit-your-idea')
                    </a>
                </div>
            @endif

            @include('modals.idea-submit-modal')

        </div>

        <div class="ui bottom attached tab segment" data-tab="submissions">
            <div class="ui segment">

                <table class="ui celled table">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($submissions as $submission)
                        <tr>
                            <td class="collapsing">
                                <h4 class="ui image header">
                                    <img src="{{ $submission->user->present()->avatar }}" class="ui mini rounded image">

                                    <div class="content">
                                        {{ $submission->user->present()->name }}
                                    </div>
                                </h4>
                            </td>
                            <td>
                                {{ $submission->content }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>

@endsection