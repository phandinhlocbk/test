<div class="row mb-3">
    <label for="example-text-input" class="col-sm-2 col-form-label">Label </label>
    @include('user.task_page.include.input', ['name' => 'label', 'value' => $label])
</div>
<div class="row mb-3">
    <label for="example-text-input" class="col-sm-2 col-form-label">Task Name</label>
    @include('user.task_page.include.input', ['name' => 'task_name', 'value' => $name])
</div>
<div class="row mb-3">
    <label for="example-date-input" class="col-sm-2 col-form-label">Start Date</label>
    @include('user.task_page.include.date_input', ['name' => 'start_date','value' => $start])
</div>
<div class="row mb-3">
    <label for="example-date-input" class="col-sm-2 col-form-label">End Date</label>
    @include('user.task_page.include.date_input', ['name' => 'end_date', 'value' => $end])
</div>
<div class="row mb-3">
    <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
        <select name="status" class="form-select" aria-label="Default select example" value="">
            <option selected="">Open this select menu</option>
            <option value="1" @if(old('status')=="1" ) selected @elseif($status=="1" )selected @endif>
                Pending
            </option>
            <option value="2" @if(old('status')=="2" ) selected @elseif($status=="2" )selected @endif>On
                Process</option>
            <option value="3" @if(old('status')=="3" ) selected @elseif($status=="3" )selected @endif>Done
            </option>
        </select>
        @if ($errors->has('status'))
        <span class="text-danger">{{ $errors->first('status') }}</span>
        @endif
    </div>
</div>
<div class="row mb-3">
    <label for="example-text-input" class="col-sm-2 col-form-label">Priority</label>
    <div class="col-sm-10">
        <select name="priority" class="form-select" aria-label="Default select example" value="">
            <option selected="">Open this select menu</option>
            <option value="1" @if(old('priority')=="1" ) selected @elseif($priority=="1" )selected @endif>Urgent
            </option>
            <option value="2" @if(old('priority')=="2" ) selected @elseif($priority=="2" )selected @endif>High</option>
            <option value="3" @if(old('priority')=="3" ) selected @elseif($priority=="3" )selected @endif>Medium
            </option>
            <option value="4" @if(old('priority')=="4" ) selected @elseif($priority=="4" )selected @endif>Low</option>
        </select>
        @if ($errors->has('priority'))
        <span class="text-danger">{{ $errors->first('priority') }}</span>
        @endif
    </div>
</div>
<div class="row mb-3">
    <label for="example-text-input" class="col-sm-2 col-form-label">Task Description</label>
    @include('user.task_page.include.input', ['name' => 'task_description', 'value' => $description])
</div>
