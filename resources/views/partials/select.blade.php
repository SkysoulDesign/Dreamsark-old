<div class="field @if($errors->has($name)) error @endif">
    <label>{{ $label or ucwords(str_replace('_', ' ', $name)) }}</label>
    <select class="ui dropdown" name="{{ $name }}">
        <option value="">{{ $placeholder or ucwords(str_replace('_', ' ', $name)) }}</option>
        @foreach($collection as $key => $value)
            <option {{ (auth()->check() ? auth()->user()->{$name} : old($name)) == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>
