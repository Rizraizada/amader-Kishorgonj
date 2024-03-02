<div class="col-md-6 col-sm-6">
    <label for="expertise" class="label-with-star">কি কি কাজে অভিজ্ঞ <span class="star text-danger">
            *</span></label>
    <div class="custom-dropdown">
        <select class="form-control select2" name="expertise[]" multiple="multiple" required>
            @foreach ($expertise as $key => $val)
                <option value="{{ $key }}">{{ $val }}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="col-md-6 col-sm-6">
    <label for="email" class="label-with-star">কত সাল থেকে এই কাজে যুক্ত <span class="star text-danger">
            *</span></label>
    <select name="working_start_year" id="working_start_year" class="form-control" required>
    </select>
    @error('working_start_year')
        <span class="text text-danger">{{ $errors->first('working_start_year') }}</span>
    @enderror
</div>

@push('custom-js')
    <script>
        $(function() {
            for (i = new Date().getFullYear(); i > 1970; i--)
                $('#working_start_year').append($('<option />').val(i).html(i));
        });
    </script>
@endpush
