@extends('layouts.admin')
@section('content')
<main>
    <form action="/admin/report_management/generate_agent_account" method="get">
        <div class="row row-sm">
            <div class="col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="row">
                            <!-- col -->
                            <div class="col-lg-12">
                                <ul id="tree1">

                                    @foreach ($groups as $group)
                                    <li><a href="javascript:;">{{ $group->ledger_group_name }}</a>
                                        <ul>
                                            @foreach ($group->subgroups as $subgroup)
                                            <li>{{ $subgroup->ledger_subgroup_name }}
                                                <ul>
                                                    @foreach ($subgroup->ledgers as $ledger)
                                                    <li>{{ $ledger->ledger_head_name }}</li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /col -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection