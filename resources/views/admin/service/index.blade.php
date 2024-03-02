@extends('admin.layouts.layout')
@section('content')
    <section class="panel panel-default" style="margin-top: 10px;">
        <div class="panel-headings" style="background-color: #eef3ff;">
            <h3 class="panel-title" style="font-size: 18px; padding:  10px;color:#1b8af3;font-weight:bold;">
                {{ ucfirst($service_ef) }} তালিকা :: অনুসন্ধান করুন
            </h3>
        </div>
        <div class="panel-body" style="padding: 20px;">
            <div class="adv-table">
                <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <form class="form-inline" id="searchForm" action="{{ route('adminServiceList', $name) }}"
                        method="get">
                        <div class="form-group">
                            <label for="name" class="control-label" style="font-size: 12px; display: block;">
                                নাম / ইমেইল / মোবাইল নং
                            </label>
                            <input type="text" class="form-control" id="name" style="font-size: 12px; width: 300px;"
                                name="name" placeholder="অনুসন্ধান করুন...">
                        </div>

                        <div class="form-group">
                            <label for="specializations" class="control-label" style="font-size: 12px; display: block;">
                                {{ ucfirst($service_ez) }}
                            </label>
                            <select class="form-control" name="specializations" id="specializations">
                                <option value="">নির্বাচন করুন</option>
                                @foreach ($expertise as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" style="font-size: 16px; margin-top: 19px;">
                            অনুসন্ধান করুন
                        </button>
                    </form>

                    <!-- Rest of your table content goes here -->
                </div>
            </div>
        </div>

    </section>


    <div class="col-md-12" style="background-color: white;">
        <div class="table-responsive table-sm">
            <table class="table">
                <caption class="text-uppercase font-weight-bold" style="font-size: 18px;color:#1b8af3;font-weight:bold;">
                    {{ ucfirst($service_ef) }} তালিকা </caption>
                <thead style="border: 1px solid #ddd;">
                    <tr>
                        <th style="border: 1px solid #ddd;">ছবি</th>
                        <th style="border: 1px solid #ddd;">নাম (ইংরেজি)</th>
                        <th style="border: 1px solid #ddd;">নাম (বাংলায়)</th>
                        <th style="border: 1px solid #ddd;">ইমেইল</th>
                        <th style="border: 1px solid #ddd;">মোবাইল নং</th>
                        <th style="border: 1px solid #ddd;">বিশেষজ্ঞতা</th>
                        <th style="border: 1px solid #ddd;">অবস্থা</th>

                        <th colspan="1"style="border: 1px solid #ddd;">করণীয়</th>
                    </tr>
                </thead>
                <tbody style="border: 1px solid #ddd;">
                    @forelse ($primaryInfo as $key => $row)
                        <tr style="border: 1px solid #ddd;">
                            <td style="border: 1px solid #ddd; font-size:10px;"><img
                                src="{{ asset($photoPath . '/' . $row->photo) }}" alt="User Photo"
                                style="max-width: 50px; max-height: 50px;"
                                onerror="this.src = '{{ asset('uploads/images/Photo-Placeholder-Image-150x150-1.jpg') }}'">
                            </td>
                            <td style="border: 1px solid #ddd;">{{ $row->name_en }}</td>
                            <td style="border: 1px solid #ddd;">{{ $row->name_bn }}</td>
                            <td style="border: 1px solid #ddd;">{{ $row->email }}</td>
                            <td style="border: 1px solid #ddd;"><a href="tel:{{ $row->mobile_no }}">{{ $row->mobile_no }}</a></td>
                            <td style="border: 1px solid #ddd;">
                                @if ($row->doctor && $type == 1)
                                    {{ $expertise->get($row->doctor->expertise) ?? '' }}
                                @elseif ($row->electrician && $type == 6)
                                    {{ $row->electrician->expertise ? implode(', ', array_map(fn($value) => $expertiseelectrician[$value] ?? 'N/A', explode(',', $row->electrician->expertise))): 'Expertise not found' }}
                                @elseif ($row->lawyer && $type == 3)
                                    {{ $expertise->get($row->lawyer->expertise) ?? '' }}
                                @elseif ($row->barbar && $type == 2)
                                    {{ $row->barbar->expertise ? implode(', ', array_map(fn($value) => $expertisebarbar[$value] ?? 'N/A', explode(',', $row->barbar->expertise))): '' }}
                                @elseif ($row->rent_car && $type == 4)
                                    <?php $carTypes = []; ?>
                                    @foreach ($row->rent_car as $rentCar)
                                        <?php $carTypes[] = $expertise->get($rentCar->car_type) ?? ''; ?>
                                    @endforeach
                                    {{ implode(', ', $carTypes) }}
                                @elseif ($row->beautician && $type == 5)
                                    {{ $row->beautician->expertise ? implode(', ', array_map(fn($value) => $expertisebeautician[$value] ?? 'N/A', explode(',', $row->beautician->expertise))): 'Expertise not found' }}
                                @else
                                    Expertise not found
                                @endif
                            </td>
                            
                            
                            
                            
                            <td style="border: 1px solid #ddd;">
                                <div class="status-button">
                                    <div class="status-text">
                                        {{ $row->status === 'active' ? 'Active' : 'Active' }}
                                    </div>
                                </div>
                            </td>
                            {{-- <td>
                                <a href="/admin/services/edit/{{ $service_en . '/' . $row->id }}" title="Edit"><i class="fas fa-edit"></i></a>
                            </td> --}}
                            <td>
                                <a href="/admin/services/view/{{ $service_en . '/' . $row->id }}" title="View"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">There is no data</td>
                        </tr>
                    @endforelse
                </tbody>


            </table>
        </div>
    </div>
    <div id="loadMore" style="text-align: center; margin-top: 20px; margin-bottom: 10px;">
        @if (!empty($primaryInfo))
            {{ $primaryInfo->appends(request()->query()) }}
        @endif
    </div>
@endsection

@push('custom-js')
    <script>
        $(function() {
            $('#searchButton').click(function(e) {
                e.preventDefault();

                name = $('#name').val();
                mobile_no = $('#mobile_no').val();
                designation = $('#designation').val();

                if (name.length > 5 || designation.length > 5 || mobile_no.length > 5) {
                    $('#searchForm').submit();
                } else {
                    alert('Please write something for the search');
                }
            });
        })
    </script>
@endpush
