@extends('Panel.layouts.index')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Chronic Diseas Page</div>
                <div class="card-body">
                    <a href="{{ route('chronic.create') }}" class="btn btn-success btn-sm" title="Add New chronicDiseas">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>IDdisease</th>
                                    <th>name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chronicDiseas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <!-- <td>{{ $item->IDdisease }}</td> -->
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('chronic.show', [$item->IDdisease]) }}"
                                                title="View chronic Diseas"><button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ route('chronic.edit', [$item->IDdisease]) }}"
                                                title="Edit chronic Diseas"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pen" aria-hidden="true"></i> </button></a>
                                            <form method="POST" action="{{ route('chronic.destroy', [$item->IDdisease]) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Delete chronic Diseas"
                                                    onclick="return confirm('Are you want to delete this ?')"><i
                                                        class="fa fa-trash" aria-hidden="true"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
