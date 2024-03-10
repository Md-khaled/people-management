<form action="{{ route('people.index') }}" method="GET">
    <div class="row md-3">
        <div class="col-md-3">
            <label for="birth_year" class="form-label">Birth Year</label>
            <select class="form-select" id="birth_year" name="birth_year">
                <option value="">All</option>
                @for ($year = date('Y'); $year >= 1900; $year--)
                    <option value="{{ $year }}" {{ request()->input('birth_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
            </select>
        </div>
        <div class="col-md-3">
            <label for="birth_month" class="form-label">Birth Month</label>
            <select class="form-select" id="birth_month" name="birth_month">
                <option value="">All</option>
                @for ($month = 1; $month <= 12; $month++)
                    <option value="{{ $month }}" {{ request()->input('birth_month') == $month ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                @endfor
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-center justify-content-start mt-4">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>
</form>

<style>
    .pagination {
        --bs-pagination-border-color: initial !important
    }
</style>
